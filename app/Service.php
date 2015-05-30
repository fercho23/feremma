<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    protected $table = 'services';

    protected $fillable = ['name', 'description', 'price'];

    public $timestamps = true;

    public function reservations() {
        return $this->belongsToMany('Reservation', 'service_reservation')
                    ->withPivot('moment', 'price', 'name');
    }

}
