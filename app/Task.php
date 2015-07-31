<?php namespace FerEmma;


use Illuminate\Database\Eloquent\Model;
use Auth;

//! Modelo Task (Tarea)
class Task extends Model {

    //! Contiene el nombre de la tabla de la Bases de Datos.
    protected $table = 'tasks';

    //! Contiene los nombres de las columnas de la tabla.
    protected $fillable = ['name', 'description', 'priority', 'state',
                           'role_id'];

    //! Indica que se guardan valores (tipo fecha y hora) relacionados a la
    //! creación y ultima modificación del objeto.
    public $timestamps = true;

    /*! \brief Relación de pertenencia.
     *
     * Relación de pertenencia, muchas Tareas (Task) pertenecen a un Cargo (Role).
     * @return Consulta de Base de Datos
     */
    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    /*! \brief Relación de pertenencia.
     *
     * Relación de pertenencia, muchas Tareas (Task) pertenecen a un Usuario (User).
     * @return Consulta de Base de Datos
     */
    public function user() {
        return $this->belongsTo('FerEmma\User', 'attendant_id');
    }

    public function end() {
        $this->state='finalizada';
        $this->update();
    }

    public function start() {
        $this->state = 'en proceso';
        $this->attendant_id = Auth::user()->id;
        $this->update();
    }

    public function delete() { }

    public function forToday() {
        $d = strtotime("today");
        return Task::where('created_at', '>=', date("Y-m-d H:i:s", $d))->get();
    }
}