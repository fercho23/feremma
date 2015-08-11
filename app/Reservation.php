<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

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
