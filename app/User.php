<?php namespace FerEmma;

use FerEmma\Tasks;
use FerEmma\Permission;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use FerEmma\UserACL;
use \Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    use UserACL;

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
        return $this->belongsToMany('FerEmma\Task', 'user_task')
                    ->withPivot('check_in', 'check_out');
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
}
