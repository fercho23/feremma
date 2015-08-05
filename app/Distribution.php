<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Distribución
class Distribution extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'distributions';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Distribution - Rooms).
    /*!
     * Relación de pertenencia, muchas Distribuciones (Distribution) poseen muchas Habitaciones (Rooms).
     * @return Consulta de Base de Datos
     */
    public function rooms() {
        return $this->belongsToMany('FerEmma\Rooms', 'room_rooms')
                    ->withPivot('amount');
    }


    // public function totalBeds() {
    // }

    // public function price() {
    // }

}
