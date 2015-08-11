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

    /// Borrar Tarea (User).
    /*!
     * Se determina si una Tarea puede ser borrada, en caso de que si la misma es borrada.
     * @see canBeEliminated
     * @return Booleano (Verdadero o Falso)
     */
    public function delete() {
        if ($this->state == 'finalizada') {
            flash()->error('Error: Las Tareas finalizadas no pueden ser borradas.');
            return false;
        }
        if ($this->canBeEliminated()) {
        // if (isset($this->attendant_id)) {
            flash()->error('Error: Las Tareas con responsable asignado deben ser canceladas antes de ser borradas.');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Tarea borrada con exito.');
            return true;
        }
        flash()->error('Error desconocido al intentar borrar Tarea.');
    }

    /// Verifica si la Tarea (Task) puede ser eliminada.
    /*!
     * Determina si esta Tarea puede ser eliminada, eso es posible siempre y cuando
     * esta Tarea no tenga relación con ningún Usuario (User).
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeEliminated() {
        if(count($this->user))
            return false;
        // if(count($this->role))
            // return false;
        return true;
    }

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

    /// Cancela una Tarea que habia tomado para su realización.
    /*!
     * Cambia el estado de la Tarea de "en proceso" a "pendiente" y le borra el Usario responsable.
     */
    public function cancel() {
        $this->state = 'pendiente';
        $this->attendant_id = null;
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