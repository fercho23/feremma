<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

//! Modelo Cargo
class Role extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'roles';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'slug', 'description'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Uno a Muchos" (Role - User).
    /*!
     * Relación de pertenencia, un Cargo (Role) posee muchas Usuarios (User).
     * @return Consulta de Base de Datos
     */
    public function users() {
        return $this->hasMany('FerEmma\User', 'role_id');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Role - Permission).
    /*!
     * Relación de pertenencia, muchos Cargos (Role) poseen muchos Permisos (Permission).
     * @return Consulta de Base de Datos
     */
    public function permissions() {
        return $this->belongsToMany('FerEmma\Permission');
    }

    /// Relación de pertenencia "Uno a Muchos" (Role - Task).
    /*!
     * Relación de pertenencia, un Cargo (Role) posee muchas Tareas (Task).
     * @return Consulta de Base de Datos
     */
    public function tasks() {
        return $this->hasMany('FerEmma\Task', 'role_id');
    }

    /// Borrar cargo.
    /*!
     * Borra cargo
     * @return Booleano
     */
    public function delete() {
        if (count(DB::table('permission_role')->where('role_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar cargos que tengan permisos asignados');
            return false;
        }        
        if (parent::delete()) {
            flash()->success('Cargo borrado con exito');
            return true;
        }
        else
        {
            flash()->error('Error desconocido al intentar borrar cargo');
        }
    }
}
