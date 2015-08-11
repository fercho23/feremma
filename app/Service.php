<?php namespace FerEmma;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

//! Modelo Servicio
class Service extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'services';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Service - Reservation).
    /*!
     * Relación de pertenencia, muchos Servicios (Service) poseen muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'service_reservation')
                    ->withPivot('moment', 'price', 'name');
    }

    /// Borrar Servicio (Service).
    /*!
     * Se determina si un Servicio puede ser borrado, en caso de que si
     * el mismo es borrado.
     * @return Booleano (Verdadero o Falso)
     */
    public function delete() {
        if ($this->canBeEliminated()) {
        // if (count(DB::table('service_reservation')->where('service_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar Servicios que hayan sido añadidos a una Reserva.');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Servicio borrado con exito.');
            return true;
        }
        flash()->error('Error desconocido al intentar borrar Servicio.');

    }

    /// Verifica si el Servicio (Service) puede ser eliminado.
    /*!
     * Determina si este Servicio puede ser eliminado, eso es posible siempre y cuando
     * este Servicio no tenga relación con ninguna Reserva (Reservation)
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeEliminated() {
        if(count($this->reservations))
            return false;
        return true;
    }

}
