<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'Tasks';

    protected $fillable = ['name', 'description', 'priority', 'state',
                           'post_id'];

    public $timestamps = true;

    public function post() {
        return $this->belongsTo('Post', 'post_id');
    }

    public function tasks() {
        return $this->belongsToMany('Task', 'user_task')
                    ->withPivot('check_in', 'check_out');
    }

}
