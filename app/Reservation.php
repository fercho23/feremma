<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Reserva
class Reservation extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'reservations';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['owner_id', 'description', 'total_price', 'sign',
                           'due', 'check_in', 'check_out', 'real_check_in', 'real_check_out'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Uno" (Reservation - User).
    /*!
     * Relación de pertenencia, muchas Reservas (Reservation) pertenecen a un Usuario (User).
     * @return Consulta de Base de Datos
     */
    public function owner() {
        return $this->belongsTo('FerEmma\User', 'owner_id');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Reservation - Room).
    /*!
     * Relación de pertenencia, muchas Reservas (Reservation) poseen muchas Habitaciones (Room).
     * @return Consulta de Base de Datos
     */
    public function rooms() {
        return $this->belongsToMany('FerEmma\Room', 'room_reservation')
                    ->withPivot('distribution_id', 'price');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Reservation - Service).
    /*!
     * Relación de pertenencia, muchas Reservas (Reservation) poseen muchos Servicios (Service).
     * @return Consulta de Base de Datos
     */
    public function services() {
        return $this->belongsToMany('FerEmma\Service', 'service_reservation')
                    ->withPivot('moment', 'quantity', 'price', 'name')
                    ->orderBy('service_reservation.name');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Reservation - User).
    /*!
     * Relación de pertenencia, muchas Reservas (Reservation) poseen muchos Usuarios (User).
     * @return Consulta de Base de Datos
     */
    public function booking() {
        return $this->belongsToMany('FerEmma\User', 'reservation_user');
    }

    /// Borrar Reserva (Reservation).
    /*!
     * Se determina si una Reserva puede ser borrada, en caso de que si la misma es borrada.
     * @see canBeEliminated
     * @return Booleano (Verdadero o Falso)
     */
    public function delete() {
        if ($this->canBeEliminated()) {
            flash()->error('No se pueden borrar Reservas que tengan Check In.');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Reserva borrada con exito.');
            return true;
        }
        flash()->error('Error desconocido al intentar borrar Reserva.');
    }

    /// Realiza el Check In de la Reserva (Reservation).
    /*!
     * Actualiza al tiempo y hora de este momento el campo real_check_in.
     * @return Booleano (Verdadero o Falso)
     */
    public function checkIn() {
        $this->real_check_in = date('Y-m-d H:i:s');
        if(!$this->save())
            return false;
        return true;
    }

    /// Realiza el Check Out de la Reserva (Reservation).
    /*!
     * Actualiza al tiempo y hora de este momento el campo real_check_out.
     * @return Booleano (Verdadero o Falso)
     */
    public function checkOut() {
        $this->real_check_out = date('Y-m-d H:i:s');
        if(!$this->save())
            return false;
        return true;
    }

    /// Verifica si la Reserva (Reservation) puede ser eliminada.
    /*!
     * Determina si esta Reserva puede ser eliminada, eso es posible siempre y cuando
     * esta no tenga el campo real_check_in.
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeEliminated() {
        if($this->real_check_in !== null)
            return true;
        return false;
    }

    /// Verifica si la Reserva (Reservation) puede ser modificada.
    /*!
     * Determina si esta Reserva puede ser modificada, eso es posible siempre y cuando
     * esta no tenga el campo real_check_in.
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeModified() {
        if($this->real_check_in === null)
            return true;
        return false;
    }

    /// Obtiene Reservas (Reservation) entre fechas.
    /*!
     * Esto lo hace realizando una seria de consultas:
     * - Busca Reservas (Reservation) cuya fecha de salida sea posterior o igual a la entrada solicitada y 
     * a su vez que la entrada solicitada sea posterior o igual a la entrada de la reserva.
     * - Busca Reservas (Reservation) cuya fecha de entrada sea anterior o igual a la fecha de salida solicitada y 
     * a su vez cuya fecha de salida sea posterior o igual a la fecha de salida solicitada.
     * - Busca Reservas (Reservation) cuya fecha de entrada sea posterior o igual a la fecha de entrada solicitada y 
     * su fecha de salida sea anterior o igual a la fecha de salida solicitada.
     * - Busca Reservas (Reservation) cuya fecha de entrada sea anterior o igual a la fecha de entrada solicitada y 
     * a su vez cuya fecha de salida sea posterior o igual a la fecha de salida solicitada.
     * @return $ids de Reservas
     */
    static function getReservationIdsByDates($check_in, $check_out) {
        $reservations = Reservation::where('check_out', '>=', $check_in)
                                   ->where('check_in', '<=', $check_in)
                                   ->lists('id');

        $query = Reservation::where('check_in', '<=', $check_out)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '>=', $check_in)
                            ->where('check_out', '<=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '<=', $check_in)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        return $reservations;
    }

    /// Obtiene las Reservas (Reservation) que se puede hacer Chek In.
    /*!
     * Obtiene totas las Reservas que se puede hacer Check In, que es siempre y cuando el 
     * campo real_check_in sea NULL.
     * @param $pagination = null -> es para setear la cantidad de objetos por página
     * @return Consulta de Base de Datos
     */
    static function getReservationsForCheckIn($pagination=null) {
        if(isset($pagination))
            return Reservation::where("real_check_in", null)->paginate($pagination);
        return Reservation::where("real_check_in", null)->get();
    }

    /// Obtiene las Reservas (Reservation) que se puede hacer Chek Out.
    /*!
     * Obtiene totas las Reservas que se puede hacer Check Out, que es siempre y cuando el 
     * campo real_check_in no sea NULL y el campo real_check_out sea NULL.
     * @param $pagination = null -> es para setear la cantidad de objetos por página
     * @return Consulta de Base de Datos
     */
    static function getReservationsForCheckOut($pagination=null) {
        if(isset($pagination))
            return Reservation::whereNotNull("real_check_in")
                              ->where("real_check_out", null)->paginate($pagination);
        return Reservation::whereNotNull("real_check_in")
                          ->where("real_check_out", null)->get();
    }

    /// Devuelve el estado de la Reservas (Reservation).
    /*!
     * Si la Reserva no posee real_check_in está para Check In, si no posee real_check_out, está para Check Out,
     * y si la reserva os posee a los 2 entonces es Histótica
     * @return String = [Para Check In, Para Check Out, Histórica]
     */
    public function state() {
        if($this->real_check_in) {
            if($this->real_check_out)
                return "Histórica";
            else
                return "Para Check Out";
        }
        return "Para Check In";
    }

    static function todaysChekIns() {
        return count(Reservation::where('check_in', '=', date("Y-m-d", strtotime("today")))->get());
    }

    static function todaysChekOuts() {
        return count(Reservation::where('check_out', '=', date("Y-m-d", strtotime("today")))->get());
    }

    /// Cantidad de personas en la que pueden entrar en Reserva (Reservation) teniendo en cuenta todas las Habitaciones (Room).
    /*!
     * Cantidad de personas en la Reserva teniendo en cuenta todas las Habitaciones y
     * su respectiva Distribución.
     * @return Número
     */
    public function totalPosiblePersons() {
        $total = 0;
        foreach($this->rooms as $room) {
            $distribution_id = $room->getMyDistributionByReservationId($this->id);
            $distribution = Distribution::find($distribution_id);
            $total += $distribution->totalPersons();
        }
        return $total;
    }

    /// Cantidad de personas en la  Reserva (Reservation).
    /*!
     * Cantidad de personas en la Reserva.
     * @return Número
     */
    public function totalPersons() {
        return $this->booking()->count() + 1;
    }


}
