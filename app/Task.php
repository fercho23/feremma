<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use Auth;

//! Modelo Tarea
class Task extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'tasks';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'priority', 'state',
                           'role_id'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Uno" (Task - Role).
    /*!
     * Relación de pertenencia, muchas Tareas (Task) pertenecen a un Cargo (Role).
     * @return Consulta de Base de Datos
     */
    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    /// Relación de pertenencia "Uno a Muchos" (User - Task).
    /*!
     * Relación de pertenencia, un Usuario (User) posee (atiende) muchas Tareas (Task).
     * @return Consulta de Base de Datos
     */
    public function user() {
        return $this->belongsTo('FerEmma\User', 'attendant_id');
    }

    public function delete() { }

    /// Finaliza una Tarea.
    /*!
     * Cambia el estado de la Tarea a "finalizada".
     */
    public function end() {
        $this->state = 'finalizada';
        $this->update();
    }

    /// Toma una Tarea.
    /*!
     * Cambia el estado de la Tarea a "en proceso" y le asifna un Usario (User).
     */
    public function start() {
        $this->state = 'en proceso';
        $this->attendant_id = Auth::user()->id;
        $this->update();
    }

    /// Tareas de hoy.
    /*!
     * Trae las Tareas que del dia de la fecha.
     * @return Consulta de Base de Datos
     */
    public function forToday() {
        $d = strtotime("today");
        return Task::where('created_at', '>=', date("Y-m-d H:i:s", $d))->get();
    }
}