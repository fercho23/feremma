<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';

    protected $fillable = ['name', 'description'];

    public $timestamps = true;

    public function users() {
        return $this->hasMany('User', 'post_id');
    }

}
