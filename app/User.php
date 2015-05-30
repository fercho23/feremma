<?php namespace FerEmma;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = ['post_id', 'username', 'password', 'name',
                           'surname', 'email', 'dni', 'address',
                           'phone', 'cuil', 'birthday', 'sex'];

    protected $hidden = ['password', 'remember_token'];

    public function reservations() {
        return $this->hasMany('Reservation', 'owner_id');
    }

    public function post() {
        return $this->belongsTo('Post', 'post_id');
    }

    public function booking() {
        return $this->belongsToMany('Reservation', 'reservation_user');
    }

    public function tasks() {
        return $this->belongsToMany('Task', 'user_task')
                    ->withPivot('check_in', 'check_out');
    }

}
