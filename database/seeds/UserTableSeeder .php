<?php

use FerEmma\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(//1
            'email'    => 'foo@bar.com',
            'name'     => 'Emmanuel',
            'surname'  => 'Sanchez',
            'cuil'     => '003239552000',
            'dni'      => '32395520',
            'address'  => 'Sarmiento 2345',
            'username' => 'emmanuelsf',
            'phone'    => '2235398647',
            'role_id'  => '1',
            'password' => Hash::make('1234')
            ));
        User::create(array(//2
            'email'    => 'hola@bar.com',
            'name'     => 'Fernando',
            'surname'  => 'Mateos',
            'cuil'     => '000000000000',
            'dni'      => '00000000',
            'address'  => 'Cabeza De Termo 1234',
            'username' => 'fernandom',
            'phone'    => '00000000000',
            'role_id'  => '1',
            'password' => Hash::make('678')
             ));
    }

}
