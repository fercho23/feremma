<?php

use FerEmma\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'foo@bar.com', 'name'=>'Emmanuel', 'surname'=>'Sanchez', 'cuil'=>'003239552000', 'dni'=>'32395520', 'address'=>'Sarmiento 2345', 'username'=>'emmanuelsf', 'phone'=>'2235398647', 'password'=>'1234'));
        User::create(array('email' => 'hola@bar.com', 'name'=>'Fernando', 'surname'=>'Mateos', 'cuil'=>'000000000000', 'dni'=>'00000000', 'address'=>'Nestor Kirchner 1234', 'username'=>'fernandom', 'phone'=>'00000000000', 'password'=>'678'));
    }

}
