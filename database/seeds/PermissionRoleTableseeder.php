<?php

use FerEmma\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permission_role')->truncate();

        Role::create(array(//1                
                'permission_id' =>'1',
                'role_id'       =>'1'
        ));
       
    }

}
