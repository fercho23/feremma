<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Cama
class Bed extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'beds';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'total_persons', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Room - Reservation).
    /*!
     * Relación de pertenencia, muchas Habitaciones (Room) poseen muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function rooms() {
        return $this->belongsToMany('FerEmma\Reservation', 'room_reservation')
                    ->withPivot('check_in', 'check_out');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Bed - Distribution).
    /*!
     * Relación de pertenencia, muchas Camas (Bed) poseen muchas Distribuciones (Distribution).
     * @return Consulta de Base de Datos
     */
    public function distributions() {
        return $this->belongsToMany('FerEmma\Distribution', 'distribution_bed')
                    ->withPivot('amount');
    }

}
