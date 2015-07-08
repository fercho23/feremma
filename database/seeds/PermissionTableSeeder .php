<?php

use FerEmma\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->truncate();

        Permission::create(array(//1
            'permission_title'         =>'Ver Crear Usuario',
            'permission_slug'          =>'users/create',
            'permission_description'   =>'Crea un cliente (método Get).'
            ));

        Permission::create(array(//2
            'permission_title'         =>'Ver Editar Usuario',
            'permission_slug'          =>'users/edit',
            'permission_description'   =>'Edita un cliente (método Get).'
            ));

        Permission::create(array(//3
            'permission_title'         =>'Eliminar Usuario',
            'permission_slug'          =>'users/delete',
            'permission_description'   =>'Elimina un cliente.'
            ));

        Permission::create(array(//4
            'permission_title'         =>'Listar Usuario',
            'permission_slug'          =>'users/list',
            'permission_description'   =>'Lista clientes.'
            ));

    }

}