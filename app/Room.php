<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Habitación
class Room extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'rooms';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'types_beds', 'total_beds',
                           'location', 'plan', 'available', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Room - Reservation).
    /*!
     * Relación de pertenencia, muchas Habitaciones (Room) poseen muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'room_reservation')
                    ->withPivot('check_in', 'check_out');
    }

}
