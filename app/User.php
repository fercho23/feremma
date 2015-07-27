<?php namespace FerEmma;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

//use FerEmma\Task;

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
        if ($last == '24h')
            return DB::table('tasks')->where('role_id', '=', $this->role->id)->where('state', '=', $state)->where('updated_at', '>', date('Y-m-d H:m:s',strtotime('-24 hours')))->get();
        return DB::table('tasks')->where('role_id', '=', $this->role->id)->where('state', '=', $state)->get();
    }

    public function can($perm = null)
    {
        if($perm)
            return $this->checkPermission($perm);
        return false;
    }

    protected function checkPermission($perm = '')
    {
        $perm = Permission::where('slug', '=', $perm)->first();
        return in_array($perm->id, $this->role->permissions()->getRelatedIds());
    }

}
