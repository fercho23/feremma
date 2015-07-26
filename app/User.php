<?php namespace FerEmma;

//use FerEmma\Tasks;
//use FerEmma\Permission;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use \Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = ['role_id', 'username', 'password', 'name',
                           'surname', 'email', 'dni', 'address',
                           'phone', 'cuil', 'birthday', 'sex'];

    protected $hidden = ['password', 'remember_token'];

    public function reservations() {
        return $this->hasMany('FerEmma\Reservation', 'owner_id');
    }

    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    public function booking() {
        return $this->belongsToMany('FerEmma\Reservation', 'reservation_user');
    }

    public function tasks() {
        return $this->hasMany('FerEmma\Task', 'attendant_id');
    }

    public function fullname() {
        return $this->name.' '.$this->surname;
    }

    public function myRoleTasks($state, $last=null)
    {
        if($last==null)
        {
            return DB::table('tasks')->where('role_id', '=', $this->role->id)->where('state', '=', $state)->get();
        }
        elseif ($last=='24h')
        {
            return DB::table('tasks')->where('role_id', '=', $this->role->id)->where('state', '=', $state)->where('updated_at', '>', date('Y-m-d H:m:s',strtotime('-24 hours')))->get();
        }
    }

    /**
     * can Checks a Permission
     *
     * @param  String $perm Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function can($perm = null)
    {
        if($perm)
            return $this->checkPermission($perm);

        return false;
    }

    protected function checkPermission($perm = '')
    {
        //$perm = Permission::where('slug', '=', $perm)->first();
        $perm = DB::table('permissions')->where('slug', '=', $perm)->first();
        return in_array($perm->id, $this->role->permissions()->getRelatedIds());

    }

    /**
     * hasPermission Checks if has a Permission (Same as 'can')
     *
     * @param  String $perm [Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function hasPermission($perm = null)
    {
        return $this->can($perm);
    }

    /**
     * Checks if has a role
     *
     * @param  String $perm [Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function hasRole($role = null)
    {
        if(is_null($role))
            return false;
        return strtolower($this->role->slug) == strtolower($role);
    }

    /**
     * Check if user has given role
     *
     * @param  String $role slug
     * @return Boolean TRUE or FALSE
     */
    public function is($role)
    {
        return $this->role->slug == $role;
    }

    /**
     * Check if user has permission to a route
     *
     * @param  String $routeName
     * @return Boolean true/false
     */
    public function hasRoute($routeName)
    {
        $route = app('router')->getRoutes()->getByName($routeName);

        if($route) {
            $action = $route->getAction();
            if(isset($action['permission'])) {
                $array = explode('_', $action['permission']);
                return $this->checkPermission($array);
            }
        }

        return false;
    }

    /**
     * Check if a top level menu is visible to user
     *
     * @param  String $perm
     * @return Boolean true/false
     */
    public function canSeeMenuItem($perm)
    {
        return $this->can($perm) || $this->hasAnylike($perm);
    }

    /**
     * Checks if user has any permission in this group
     *
     * @param  String $perm Required Permission
     * @param  Array $perms User's Permissions
     * @return Boolean true/false
     */
    protected function hasAnylike($perm)
    {
        $parts = explode('_', $perm);
        $requiredPerm = array_pop($parts);
        $perms = $this->role->permissions->fetch('slug');

        foreach ($perms as $perm) {
            if(ends_with($perm, $requiredPerm)) return true;
        }

        return false;
    }

}
