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
use Auth;

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

    public function canConsidering($conditions)
    {
        $or=false; $and=true; $competent=false;
        if (count($conditions['or'])>0) {
            foreach ($conditions['or'] as $condition => $value) {       
                if(Auth::user()->can($value))
                {
                    $or=true;
                    break;
                }   
            }
        }
        else
        {
            $or=true;
        }
        if (count($conditions['and'])>0) {
            foreach ($conditions['and'] as $condition => $value) 
            {
                if(!Auth::user()->can($value))
                {
                    $and=false;
                    break;
                }   
            }
        }
        else
        {
            $and=true;
        }
        if(count($conditions['rol'])>0)
        {   
            foreach ($conditions['rol'] as $condition => $value) 
            {
                if(Auth::user()->role->name==$value)
                {
                    $competent=true;
                    break;
                }   
            }
        }
        else
            $competent=true;

        if(($and and $or) and $competent)
            return true;
    }

}
