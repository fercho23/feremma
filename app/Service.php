<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Servicio
class Service extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'services';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /*! \brief Relación de pertenencia "Muchos a Muchos" (Service - Reservation).
     *
     * Relación de pertenencia, muchos Servicios (Service) poseen muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'service_reservation')
                    ->withPivot('moment', 'price', 'name');
    }

}
