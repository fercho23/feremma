<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $table = 'permissions';

    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = false;

    /**
     * roles() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('FerEmma\Role');
    }
}