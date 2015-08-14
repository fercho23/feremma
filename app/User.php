<?php namespace FerEmma;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;
use FerEmma\Reservation;
use Illuminate\Support\Facades\DB;

//! Modelo Usuario
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'users';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['role_id', 'username', 'password', 'name',
                           'surname', 'email', 'dni', 'address',
                           'phone', 'cuil', 'birthday', 'sex'];

    protected $hidden = ['password', 'remember_token'];

    /// Relación de pertenencia "Uno a Muchos" (User - Reservation).
    /*!
     * Relación de pertenencia, un Usuario (User) posee a muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function reservations() {
        return $this->hasMany('FerEmma\Reservation', 'owner_id');
    }

    /// Relación de pertenencia "Muchos a Uno" (User - Role).
    /*!
     * Relación de pertenencia, muchas Usuarios (User) perteneces a un Cargo (Role).
     * @return Consulta de Base de Datos
     */
    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    /// Relación de pertenencia "Muchos a Muchos" (User - Reservation).
    /*!
     * Relación de pertenencia, muchos Usuarios (User) pertenecen a muchas Reservas (Reservation).
     * @return Consulta de Base de Datos
     */
    public function booking() {
        return $this->belongsToMany('FerEmma\Reservation', 'reservation_user');
    }

    /// Relación de pertenencia "Muchos a Uno"(Task - User).
    /*!
     * Relación de pertenencia, muchas Tareas (Task) pertenecen (son atendidas) a un Usuario (User).
     * @return Consulta de Base de Datos
     */
    public function tasks() {
        return $this->hasMany('FerEmma\Task', 'attendant_id');
    }

    /// Borrar Usuario (User).
    /*!
     * Se determina si un Usuario puede ser borrado, en caso de que si el mismo es borrado.
     * @see canBeEliminated
     * @return Booleano (Verdadero o Falso)
     */
    public function delete() {

        if (count ((new Reservation)->where('owner_id','=',$this->id)->get())>0) {
            flash()->error('No se pueden borrar usuarios que sean Titulares de una Reserva.');
            return false;
        }
        if ($this->canBeEliminated()) {
        // if (count(DB::table('reservation_user')->where('user_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar usuarios que sean pasajeros de una Reserva.');
            return false;
        }        
        if (count ((new Task)->where('attendant_id','=',$this->id)->get())>0) {
            flash()->error('No se pueden borrar usuarios que participen o hayan participado de tareas.');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Usuario borrado con exito');
            return true;
        }
        flash()->error('Error desconocido al intentar borrar usuario');
    }

    /// Nombre completo.
    /*!
     * @return String = Nombre completo de Usuario
     */
    public function fullname() {
        return $this->name.' '.$this->surname;
    }

    /// Verifica si el Usuario (User) puede ser eliminada.
    /*!
     * Determina si esta Usuario puede ser eliminada, eso es posible siempre y cuando
     * esta Usuario no tenga relación con ninguna Reserva (Reservation)
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeEliminated() {
        if(count($this->reservations))
            return false;
        return true;
    }


    /// Encripta el Password.
    /*!
     * Encripta el Password del Usuario cada vez que se ingresa una nuevo.
     * @param $value = cadena de caracteres
     */
    public function setPasswordAttribute($value) {
        if(!empty($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function myTasks($state, $today=null) {
        $field='role_id';
        $value=$this->role->id;
        if($state!='pendiente')
        {
            $field='attendant_id';
            $value=$this->id;
        }
        $tasks=Task::where($field, '=', $value)->where('state', '=', $state);
        if ($today)
            return $tasks->where('updated_at', '>', date('Y-m-d H:m:s', strtotime('-24 hours')))->get();
        return $tasks->get();
    }

    /// Usuario (User) tiene Permiso (Permission).
    /*!
     * Determina si este Usuario puede o no realizar una acción dada.
     * @param $perm = cadena de caracteres
     * @return Booleano (Verdadero o Falso)
     */
    public function can($perm = null) {
        // dd($perm);
        if(strpos($perm, '-') !== false) {
            // dd($perm, strpos($perm, '-'));
            $array = explode('-', $perm);
            $perm = '';
            foreach ($array as $key => $value) {
                if($key == 0)
                    $perm .= $value;
                else
                    $perm .= ucfirst($value);
            }
        }

        if($perm)
            return $this->checkPermission($perm);
        return false;
    }

    /// Revisa si los Usuarios (User) dados existen.
    /*!
     * Determina si cada $id es de un Usuario real.
     * @param array $ids = Array de ids
     * @return Booleano (Verdadero o Falso)
     */
    static function checkValidUsers(array $ids) {
        foreach($ids as $id) {
            if(!User::find($id))
                return false;
        }
        return true;
    }

    /// Usuario (User) tiene alguno de los Permisos (Permission) dados.
    /*!
     * Determina si este Usuario puede o no realizar alguna de las acciones dadas.
     * @param $model = nombre del nodelo
     * @param array $actions = Array de acciones
     * @return Booleano (Verdadero o Falso)
     */
    public function canAnyActionsByModel($model, array $actions) {
        foreach($actions as $action) {
            if($this->checkPermission($model.'/'.$action))
                return true;
        }
        return false;
    }

    /// Usuario (User) tiene todos los Permisos (Permission) dados.
    /*!
     * Determina si este Usuario puede o no realizar todas las acciones dadas.
     * @param $model = nombre del nodelo
     * @param array $actions = Array de acciones
     * @return Booleano (Verdadero o Falso)
     */
    public function canAllActionsByModel($model, array $actions) {
        foreach($actions as $action) {
            if(!$this->checkPermission($model.'/'.$action))
                return false;
        }
        return true;
    }

    protected function checkPermission($perm = '') {
        $permission = Permission::where('slug', '=', $perm)->first();
        if(!$permission)
            return false;
        return in_array($permission->id, $this->role->permissions()->getRelatedIds());
    }

    public function canConsidering($conditions)
    {
        $or = false;
        $and = true;
        $competent = false;

        if (isset($conditions['or'])) {
            foreach ($conditions['or'] as $condition => $value) {
                if(Auth::user()->can($value)) {
                    $or = true;
                    break;
                }
            }
        } else {
            $or = true;
        }

        if (isset($conditions['and'])) {
            foreach ($conditions['and'] as $condition => $value) {
                if(!Auth::user()->can($value)) {
                    $and=false;
                    break;
                }
            }
        } else {
            $and = true;
        }

        if(isset($conditions['rol'])) {
            foreach ($conditions['rol'] as $condition => $value) {
                if(Auth::user()->role->name==$value) {
                    $competent = true;
                    break;
                }
            }
        }
        else
            $competent = true;

        if(($and and $or) and $competent)
            return true;
    }

    /// Obtiene las Tareas (Task) atrasadas.
    /*!
     * Obtiene las tareas pendientes para un rol y en proceso para un  usuario, con mas de unsa semana desde su ultima modificación.
     * @return Consulta de Base de Datos
     */
    public function delayTasks() {
        $waitingTasks=DB::table('tasks')->where('role_id', '=', $this->role->id)->where('state', '=', 'pendiente')->where('updated_at', '<=', date('Y-m-d H:m:s', strtotime('-7 days')));
        $startedTasks=DB::table('tasks')->where('attendant_id', '=', $this->id)->where('state', '=', 'en proceso')->where('updated_at', '<=', date('Y-m-d H:m:s', strtotime('-7 days')));
        //return $waitingTasks->get();
        return $waitingTasks->union($startedTasks)->get();
    }

}