<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    protected $table = 'rooms';

    protected $fillable = ['name', 'description', 'types_beds', 'total_beds',
                           'location', 'plan', 'available', 'price'];

    public $timestamps = true;

    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'room_reservation')
                    ->withPivot('check_in', 'check_out');
    }

}
