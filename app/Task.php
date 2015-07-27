<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Task extends Model {

    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'priority', 'state',
                           'role_id'];

    public $timestamps = true;

    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    public function user() {
        return $this->belongsTo('FerEmma\User', 'attendant_id');
    }

    public function end() {
        $this->state='finalizada';
        $this->update();
    }

    public function start() {
        $this->state='en proceso';
        $this->attendant_id=Auth::user()->id;
        $this->update();
    }
}