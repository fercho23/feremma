<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'roles';

    protected $fillable = ['name', 'slug', 'description'];

    public $timestamps = true;

    public function users() {
        return $this->hasMany('FerEmma\User', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('FerEmma\Permission');
    }

    public function tasks() {
        return $this->hasMany('FerEmma\Task', 'role_id');
    }

}
