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
                    ->withPivot('distribution_id', 'price');
    }

    /// Borrar Habitación (Room).
    /*!
     * Se determina si una Habitación puede ser borrada, en caso de que si
     * la misma es borrada.
     * @see canBeEliminated
     * @return Booleano (Verdadero o Falso)
     */
    public function delete() {
        if ($this->canBeEliminated()) {
        // if (count(DB::table('room_reservation')->where('room_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar Habitaciones que hayan sido añadidas a una Reserva.');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Habitación borrada con exito.');
            return true;
        }
        flash()->error('Error desconocido al intentar borrar Habitación.');
    }

    /// Verifica si se pueden borrar las Distribuciones (Distribution) que no estan en las $ids pasadas.
    /*!
     * Obtiene las $ids de las Distribuciones que no puede ser borradas y las compara
     * con el Array de $ids de las Distribuciones que van a ser guardadas, si alguna de
     * las que no pueden ser borradas no está devuelve Falso.
     * @return Booleano (Verdadero o Falso)
     */
    public function allDistributionsIdCanBeEliminated(array $distributions_id) {
        foreach ($this->getMyCanNotBeEliminatedDistributionsId() as $id) {
            if(!in_array($id, $distributions_id))
                return false;
        }
        return true;
    }

    /// Verifica si la Habitación (Room) puede ser eliminada.
    /*!
     * Determina si esta Habitación puede ser eliminada, eso es posible siempre y cuando
     * esta Habitación no tenga relación con ninguna Reserva (Reservation)
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeEliminated() {
        if(count($this->reservations))
            return false;
        return true;
    }

    /// Verifica si la Habitación (Room) puede ser modificada.
    /*!
     * Determina si esta Habitación puede ser modificada, eso es posible siempre y cuando
     * esta Habitación no tenga relación con ninguna Reserva (Reservation)
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeModified() {
        if(count($this->reservations))
            return false;
        return true;
    }

    /// Obtiene Habitaciones (Room) libres entre fechas.
    /*!
     * Esto lo hace realizando una seria de consultas:
     * - @see Reservation::getReservationIdsByDates
     * - Con estas Reservas (Reservation) obtenemos las Habitaciones (Room) ocupadas en esas fechas.
     * - Por último se consulta a la base de datos, las Habitaciones (Room) que no coincidan con el listado de Habitaciones (Room) ocupadas.
     * @return $ids de Habitaciones libres
     */
    static function getFreeRoomsIdsByDates($check_in, $check_out) {
        $reservations = Reservation::getReservationIdsByDates($check_in, $check_out);

        $rooms_id = \DB::table('room_reservation')
                       ->whereIn('reservation_id', $reservations)
                       ->lists('room_id');

        return Room::whereNotIn('id', $rooms_id)
                   ->where('available', 1)
                   ->lists('id');
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

    /// Obtiene las Distribuciones (Distribution) de esta Habitación (Room) que no pueden ser eliminadas.
    /*!
     * Obtiene los $ids de las Distribuciones que puede tener esta Habitación, que no pueden ser
     * eliminadas 
     * @return Array de $ids de Distribuciones de esta Habitación
     */
    public function getMyCanNotBeEliminatedDistributionsId() {
        $ids = [];
        foreach ($this->reservations as $reservation){
            $ids[] = $reservation->pivot->distribution_id;
        }
        return array_unique($ids);
    }

    /// Verifica si el $id es de una Distribución (Distribution) correcta de esta Habitación (Room).
    /*!
     * @param $distribution_id = $id de Distribución (Distribution)
     * @return Booleano (Verdadero o Falso)
     */
    public function hasThisDistributionId($distribution_id) {
        if(Distribution::find($distribution_id)) {
            if(in_array($distribution_id, $this->distributions()->getRelatedIds())) {
                if($this->distributions()->where('room_distribution.distribution_id', $distribution_id)
                                         ->where('room_distribution.room_id', $this->id)
                                         ->first()->pivot->available)
                    return true;
            }
        }
        return false;
    }

    /// Deshabilita o Habilita una Habitación.
    /*!
     * Cambia el estado de la habitación a "deshabilitada" o "habilitada".
     */
    public function toggle() {
        if ($this->available == 0)
            $this->available = 1;
        else
            $this->available = 0;
        $this->update();
    }

}
