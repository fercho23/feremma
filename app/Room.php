<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'types_beds', 'total_beds',
                           'location', 'plan'];

    public $timestamps = true;

    public function reservations() {
        return $this->belongsToMany('FerEmma\Reservation', 'room_reservation')
                    ->withPivot('check_in', 'check_out');
    }

}
