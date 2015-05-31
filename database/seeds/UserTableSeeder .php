<?php

use FerEmma\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'foo@bar.com', 'name'=>'Emmanuel', 'surname'=>'Sanchez', 'cuil'=>'003239552000', 'dni'=>'32395520', 'address'=>'Sarmiento 2345', 'username'=>'emmanuelsf', 'phone'=>'2235398647', 'password'=>'1234'));
    }

}
