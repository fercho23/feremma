<?php

use FerEmma\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->truncate();

        $role = Role::create(array(//1
                'description'   => '',
                'name'          =>'Super Usuario',
                'slug'          =>'super_user'
                ));
        $role->permissions()->sync([1, 2, 3, 4, 5, 6]);

        Role::create(array(//2
                'description'   => '',
                'name'          =>'Director',
                'slug'          =>'director'
                ));

        Role::create(array(//3
                'description'   => '',
                'name'          =>'Recepcion y Conserjeria',
                'slug'          =>'reception_janitor'
                ));

        Role::create(array(//4
                'description'   => '',
                'name'          =>'Mantenimiento, servicios técnicos y seguridad:',
                'slug'          =>'maintenance'
                ));

        Role::create(array(//5
                'description'   => '',
                'name'          =>'Cliente',
                'slug'          =>'client'
                ));

        Role::create(array(//6
                'description'   => '',
                'name'          =>'Pisos',
                'slug'          =>'cleaning'
                ));
    }

}