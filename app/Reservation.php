<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    protected $table = 'reservations';

    protected $fillable = ['owner_id', 'description', 'total_price', 'sign',
                           'due', 'check_in', 'check_out'];

    public $timestamps = true;

    public function owner() {
        return $this->belongsTo('User', 'owner_id');
    }

    public function rooms() {
        return $this->belongsToMany('FerEmma\Room', 'room_reservation')
                    ->withPivot('check_in', 'check_out');
    }

    public function services() {
        return $this->belongsToMany('FerEmma\Service', 'service_reservation')
                    ->withPivot('moment', 'price', 'name');
    }

    public function booking() {
        return $this->belongsToMany('FerEmma\User', 'reservation_user');
    }


}
