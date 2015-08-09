<?php namespace FerEmma;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

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

    /// Nombre completo.
    /*!
     * @return Nombre completo de Usuario
     */
    public function fullname() {
        return $this->name.' '.$this->surname;
    }

    /// Encripta el Password.
    /*!
     * Encripta el Password del Usuario cada vez que se ingresa una nuevo.
     * @param $value = cadena de caracteres
     * @return Nombre completo de Usuario
     */
    public function setPasswordAttribute($value) {
        if(!empty($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function myRoleTasks($state, $last=null) {
        if ($last == '24h')
            return Task::where('role_id', '=', $this->role->id)
                       ->where('state', '=', $state)
                       ->where('updated_at', '>', date('Y-m-d H:m:s', strtotime('-24 hours')))
                       ->get();
        return Task::where('role_id', '=', $this->role->id)
                   ->where('state', '=', $state)
                   ->get();
    }

    /// Usuario (User) tiene Permiso (Permission).
    /*!
     * Determina si este Usuario puede o no realizar una acción dada.
     * @param $perm = cadena de caracteres
     * @return Booleano (Verdadero o Falso)
     */
    public function can($perm = null) {
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

        if (count($conditions['or'])>0) {
            foreach ($conditions['or'] as $condition => $value) {
                if(Auth::user()->can($value)) {
                    $or = true;
                    break;
                }
            }
        } else {
            $or = true;
        }

        if (count($conditions['and'])>0) {
            foreach ($conditions['and'] as $condition => $value) {
                if(!Auth::user()->can($value)) {
                    $and=false;
                    break;
                }
            }
        } else {
            $and = true;
        }

        if(count($conditions['rol'])>0) {
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
}
