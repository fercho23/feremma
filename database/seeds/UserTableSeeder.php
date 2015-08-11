<?php

use FerEmma\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate();

        User::create(array(//1
            'email'    => 'user1@user.com',
            'name'     => 'User1',
            'surname'  => 'de Recepción',
            'cuil'     => '00100000100',
            'dni'      => '1000001',
            'address'  => 'Casa del usuario13',
            'username' => 'user1',
            'phone'    => '12345678910',
            'role_id'  => '1',//Recepcion y Conserjeria
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
        ));
        User::create(array(//2
            'email'    => 'user2@user.com',
            'name'     => 'User2',
            'surname'  => 'de Recepción',
            'cuil'     => '00200000200',
            'dni'      => '2000002',
            'address'  => 'Casa del usuario 2',
            'username' => 'user2',
            'phone'    => '12345678910',
            'role_id'  => '2',//Recepcion y Conserjeria
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
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
            'role_id'  => '3',//Recepcion y Conserjeria
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
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
            'role_id'  => '3',//Recepcion y Conserjeria
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
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
            'role_id'  => '4',//Pisos
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
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
            'role_id'  => '4',//Pisos
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//7
            'email'    => 'user7@user.com',
            'name'     => 'User7',
            'surname'  => 'de Mantenimiento',
            'cuil'     => '00600000600',
            'dni'      => '4000004',
            'address'  => 'Casa del usuario 7',
            'username' => 'user7',
            'phone'    => '12345678910',
            'role_id'  => '5',//Mantenimiento, servicios técnicos y seguridad
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//8
            'email'    => 'user8@user.com',
            'name'     => 'User8',
            'surname'  => 'Cliente',
            'cuil'     => '00600000600',
            'dni'      => '4000004',
            'address'  => 'Casa del usuario 8',
            'username' => 'user8',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//9
            'email'    => 'user9@user.com',
            'name'     => 'User9',
            'surname'  => 'de Dirección',
            'cuil'     => '00600000600',
            'dni'      => '4000004',
            'address'  => 'Casa del usuario 9',
            'username' => 'user9',
            'phone'    => '12345678910',
            'role_id'  => '2',//Director
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
    }
}
