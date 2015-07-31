<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Reserva
class Reservation extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'reservations';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['owner_id', 'description', 'total_price', 'sign',
                           'due', 'check_in', 'check_out'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /*! \brief Relación de pertenencia "Muchos a Uno" (Reservation - User).
     *
     * Relación de pertenencia, muchas Reservas (Reservation) pertenecen a un Usuario (User).
     * @return Consulta de Base de Datos
     */
    public function owner() {
        return $this->belongsTo('FerEmma\User', 'owner_id');
    }

    /*! \brief Relación de pertenencia "Muchos a Muchos" (Reservation - Room).
     *
     * Relación de pertenencia, muchas Reservas (Reservation) poseen muchas Habitaciones (Room).
     * @return Consulta de Base de Datos
     */
    public function rooms() {
        return $this->belongsToMany('FerEmma\Room', 'room_reservation')
                    ->withPivot('check_in', 'check_out')
                    ->orderBy('room_reservation.check_in');
    }

    /*! \brief Relación de pertenencia "Muchos a Muchos" (Reservation - Service).
     *
     * Relación de pertenencia, muchas Reservas (Reservation) poseen muchos Servicios (Service).
     * @return Consulta de Base de Datos
     */
    public function services() {
        return $this->belongsToMany('FerEmma\Service', 'service_reservation')
                    ->withPivot('moment', 'quantity', 'price', 'name')
                    ->orderBy('service_reservation.name');
    }

    /*! \brief Relación de pertenencia "Muchos a Muchos" (Reservation - User).
     *
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

}
