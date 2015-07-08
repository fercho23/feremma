<?php

use FerEmma\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permission_role')->truncate();

        Role::create(array(
                'permission_id' =>'1',
                'role_id'       =>'1'
        ));

        Role::create(array(
                'permission_id' =>'2',
                'role_id'       =>'1'
        ));

        Role::create(array(
                'permission_id' =>'3',
                'role_id'       =>'1'
        ));

        Role::create(array(
                'permission_id' =>'4',
                'role_id'       =>'1'
        ));

    }

}
