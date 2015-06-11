<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'priority', 'state',
                           'post_id'];

    public $timestamps = true;

    public function post() {
        return $this->belongsTo('FerEmma\Post', 'post_id');
    }

    public function users() {
        return $this->belongsToMany('FerEmma\Task', 'user_task')
                    ->withPivot('check_in', 'check_out');
    }

}
