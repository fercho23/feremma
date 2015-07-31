<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Permiso
class Permission extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'permissions';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['title', 'description', 'slug'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = false;

    /*!
     * Relación de pertenencia, muchos Permisos (Permission) poseen muchos Cargos (Role).
     * @return Consulta de Base de Datos
     */
    public function roles() {
        return $this->belongsToMany('FerEmma\Role');
    }
}