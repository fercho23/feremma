<?php

use FerEmma\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->truncate();

        Permission::create(array(
                'permission_title'              =>'Crear Usuario',
                'permission_slug'               =>'users/create',
                'permission_description'        =>'Crea un cliente.'
                ));

    }

}