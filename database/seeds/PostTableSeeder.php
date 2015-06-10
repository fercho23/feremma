<?php

use FerEmma\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        Post::create(array('description' => 'fgsfsdfsdfsdf', 'name'=>'Conserje'));
        Post::create(array('description' => 'sfskdhfñslkdjf', 'name'=>'Desarrollador'));
    }

}
