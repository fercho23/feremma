<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'priority', 'state',
                           'role_id'];

    public $timestamps = true;

    public function role() {
        return $this->belongsTo('FerEmma\Role', 'role_id');
    }

    public function users() {
        return $this->belongsToMany('FerEmma\Task', 'user_task')
                    ->withPivot('check_in', 'check_out');
    }
}