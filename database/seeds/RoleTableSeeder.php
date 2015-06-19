<?php

use FerEmma\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array('description' => 'Tipos ree grosos',
                           'name'=>'Desarrollador'
                           ));
        Role::create(array('description' => 'lala',
                           'name'=>'Conserje'
                           ));
    }

}
