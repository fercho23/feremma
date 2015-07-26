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
            'password' => Hash::make('1234')
         ));
        User::create(array(//3
            'email'    => 'user3@user.com',
            'name'     => 'User3',
            'surname'  => 'de Recepción',
            'cuil'     => '00300000300',
            'dni'      => '3000003',
            'address'  => 'Casa del usuario 3',
            'username' => 'user3',
            'phone'    => '12345678910',
            'role_id'  => '3',
            'password' => Hash::make('1234')
        ));
        User::create(array(//4
            'email'    => 'user4@user.com',
            'name'     => 'User4',
            'surname'  => 'de Recepción',
            'cuil'     => '00400000400',
            'dni'      => '4000004',
            'address'  => 'Casa del usuario 4',
            'username' => 'user4',
            'phone'    => '12345678910',
            'role_id'  => '3',
            'password' => Hash::make('1234')
         ));
        User::create(array(//5
            'email'    => 'user5@user.com',
            'name'     => 'User5',
            'surname'  => 'de Pisos',
            'cuil'     => '00500000500',
            'dni'      => '5000005',
            'address'  => 'Casa del usuario 5',
            'username' => 'user5',
            'phone'    => '12345678910',
            'role_id'  => '4',
            'password' => Hash::make('1234')
        ));
        User::create(array(//6
            'email'    => 'user6@user.com',
            'name'     => 'User6',
            'surname'  => 'de Pisos',
            'cuil'     => '00600000600',
            'dni'      => '4000004',
            'address'  => 'Casa del usuario 6',
            'username' => 'user6',
            'phone'    => '12345678910',
            'role_id'  => '4',
            'password' => Hash::make('1234')
         ));

    }
}
