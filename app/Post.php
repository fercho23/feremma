<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';

    protected $fillable = ['name', 'description'];

    public $timestamps = true;

    public function users() {
        return $this->hasMany('FerEmma\User', 'post_id');
    }

    public function tasks() {
        return $this->hasMany('FerEmma\Task', 'post_id');
    }

}
