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
            'role_id'  => '1',//Super Usuario
            'birthday' => '1990/01/01',
            'sex'      => 'm',
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
            'role_id'  => '2',//Director
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
            'sex'      => 'f',
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
            'email'    => 'client1@client.com',
            'name'     => 'Client1',
            'surname'  => 'Surname1',
            'cuil'     => '00100100100',
            'dni'      => '1001001',
            'address'  => 'Casa del cliente 1',
            'username' => 'client1',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//9
            'email'    => 'cliente2@client.com',
            'name'     => 'Client2',
            'surname'  => 'Surname2',
            'cuil'     => '00200200200',
            'dni'      => '2002002',
            'address'  => 'Casa del cliente 2',
            'username' => 'client2',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//10
            'email'    => 'client3@client.com',
            'name'     => 'Client3',
            'surname'  => 'Surname3',
            'cuil'     => '00300300300',
            'dni'      => '3003003',
            'address'  => 'Casa del cliente 3',
            'username' => 'client3',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
         ));
        User::create(array(//11
            'email'    => 'client4@client.com',
            'name'     => 'Client4',
            'surname'  => 'Surname4',
            'cuil'     => '00400400400',
            'dni'      => '4004004',
            'address'  => 'Casa del cliente 4',
            'username' => 'client4',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//12
            'email'    => 'client5@client.com',
            'name'     => 'Client5',
            'surname'  => 'Surname5',
            'cuil'     => '00500500500',
            'dni'      => '5005005',
            'address'  => 'Casa del cliente 5',
            'username' => 'client5',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
         ));
        User::create(array(//13
            'email'    => 'client6@client.com',
            'name'     => 'Client6',
            'surname'  => 'Surname6',
            'cuil'     => '0060050600',
            'dni'      => '6006006',
            'address'  => 'Casa del cliente 6',
            'username' => 'client6',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//13
            'email'    => 'client7@client.com',
            'name'     => 'Client7',
            'surname'  => 'Surname7',
            'cuil'     => '00700700700',
            'dni'      => '7007007',
            'address'  => 'Casa del cliente 7',
            'username' => 'client7',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//14
            'email'    => 'cliente8@client.com',
            'name'     => 'Client8',
            'surname'  => 'Surname8',
            'cuil'     => '00800800800',
            'dni'      => '8008008',
            'address'  => 'Casa del cliente 8',
            'username' => 'client8',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
         ));
        User::create(array(//15
            'email'    => 'client9@client.com',
            'name'     => 'Client9',
            'surname'  => 'Surname9',
            'cuil'     => '00900900900',
            'dni'      => '9009009',
            'address'  => 'Casa del cliente 9',
            'username' => 'client9',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//16
            'email'    => 'client10@client.com',
            'name'     => 'Client10',
            'surname'  => 'Surname10',
            'cuil'     => '00100100100',
            'dni'      => '1001001',
            'address'  => 'Casa del cliente 10',
            'username' => 'client10',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
         ));
        User::create(array(//17
            'email'    => 'client11@client.com',
            'name'     => 'Client11',
            'surname'  => 'Surname11',
            'cuil'     => '00100110100',
            'dni'      => '1001101',
            'address'  => 'Casa del cliente 11',
            'username' => 'client11',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'm',
            'password' => '1234'
         ));
        User::create(array(//18
            'email'    => 'client20@client.com',
            'name'     => 'Client12',
            'surname'  => 'Surname12',
            'cuil'     => '00100120100',
            'dni'      => '1001201',
            'address'  => 'Casa del cliente 12',
            'username' => 'client12',
            'phone'    => '12345678910',
            'role_id'  => '6',//Cliente
            'birthday' => '1990/01/01',
            'sex'      => 'f',
            'password' => '1234'
         ));

    }
}
