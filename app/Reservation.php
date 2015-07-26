<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    protected $table = 'reservations';

    protected $fillable = ['owner_id', 'description', 'total_price', 'sign',
                           'due', 'check_in', 'check_out'];

    public $timestamps = true;

    public function owner() {
        return $this->belongsTo('FerEmma\User', 'owner_id');
    }

    public function rooms() {
        return $this->belongsToMany('FerEmma\Room', 'room_reservation')
                    ->withPivot('check_in', 'check_out')
                    ->orderBy('room_reservation.check_in');
    }

    public function services() {
        return $this->belongsToMany('FerEmma\Service', 'service_reservation')
                    ->withPivot('moment', 'quantity', 'price', 'name')
                    ->orderBy('service_reservation.name');
    }

    public function booking() {
        return $this->belongsToMany('FerEmma\User', 'reservation_user');
    }

    public static function hola()
    {
        return "hola";
    }
}
