<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//! Modelo Habitación
class Room extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'rooms';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'location', 'available', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Room - Distribution).
    /*!
     * Relación de pertenencia, muchas Habitaciones (Room) poseen muchas Distribuciones (Distribution).
     * @return Consulta de Base de Datos
     */
    public function distributions() {
        return $this->belongsToMany('FerEmma\Distribution', 'room_distribution')
                    ->withPivot('available', 'order')
                    ->orderBy('order');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Room - Reservation).
    /*!
     * Relación de pertenencia, muchas Habitaciones (Room) poseen muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'room_reservation')
                    ->withPivot('check_in', 'check_out', 'distribution_id', 'price')
                    ->orderBy('room_reservation.check_in');
    }

    /// Obtiene las Distribuciones (Distribution) disponibles y la actual seteada de esta Habitación (Room).
    /*!
     * Obtiene en el orden correcto las Distribuciones disponibles para esta Habitación, 
     * con la distinución seteada como primera en la lista.
     * @param $reservation_id = $id de Reserva (Reservation)
     * @return Consulta de Base de Datos
     */
    public function getAvailableDistribuionsAndMyDistributionByReservationId($reservation_id) {
        $distribution = $this->getMyDistributionByReservationId($reservation_id);
        $ids = $this->distributions()->where('room_distribution.available' ,'=', '1')
                                     ->where('distribution_id', '!=', $distribution)
                                     ->orderBy('room_distribution.order')
                                     ->lists('distribution_id');
        array_unshift($ids, $distribution);
        $ids_ordered = implode(',', $ids);
        $distributions = Distribution::whereIn('id', $ids)
                                     ->orderByRaw(\DB::raw("FIELD(id, $ids_ordered)"))
                                     ->get();

        return $distributions;
    }

    /// Obtiene las Distribuciones (Distribution) disponibles para esta Habitación (Room).
    /*!
     * Obtiene en el orden correcto las Distribuciones disponibles para esta Habitación.
     * @return Consulta de Base de Datos
     */
    public function getMyAvailableDistributions() {
        $ids = $this->distributions()->where('room_distribution.available', '=', '1')
                                     ->lists('distribution_id');
        $ids_ordered = implode(',', $ids);
        $distributions = Distribution::whereIn('id', $ids)
                                     ->orderByRaw(\DB::raw("FIELD(id, $ids_ordered)"))
                                     ->get();
        return $distributions;
    }

    /// Obtiene la Distribución (Distribution) de esta Habitación (Room) en una determinada Reserva (Reservation).
    /*!
     * @param $reservation_id = $id de Reserva (Reservation)
     * @return $id de Distribución (Distribution)
     */
    public function getMyDistributionByReservationId($reservation_id) {
        return \DB::table('room_reservation')->where('room_id', '=', $this->id)
                                             ->where('reservation_id', '=', $reservation_id)
                                             ->first()->distribution_id;
    }

    /// Obtiene la el precio de la Distribución (Distribution) de esta Habitación (Room) en una determinada Reserva (Reservation).
    /*!
     * @param $reservation_id = $id de Reserva (Reservation)
     * @return $id de Distribución (Distribution)
     */
    public function getMyDistributionPriceByReservationId($reservation_id) {
        return \DB::table('room_reservation')->where('room_id' , '=', $this->id)
                                             ->where('reservation_id' , '=', $reservation_id)
                                             ->first()->price;
    }

    /// Verifica si el $id es de una Distribución (Distribution) correcta de esta Habitación (Room).
    /*!
     * @param $distribution_id = $id de Distribución (Distribution)
     * @return Booleano (Verdadero o Falso)
     */
    public function hasThisDistributionId($distribution_id) {
        if(Distribution::find($distribution_id)) {
            if($this->distributions()->where('room_distribution.distribution_id', $distribution_id)
                                     ->where('room_distribution.room_id', $this->id)
                                     ->first()->pivot->available)
                return true;
        }
        return false;
    }

    /// Borrar habitacion.
    /*!
     * Borra habitacion
     * @return Booleano
     */
    public function delete() {
        if (count(DB::table('room_reservation')->where('room_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar habitaciones que hayan sido añadidas a una reserva');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Habitacion borrada con exito');
            return true;
        }
        else
        {
            flash()->error('Error desconocido al intentar borrar habitacion');
        }
    }

}
