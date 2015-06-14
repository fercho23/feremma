<?php

use FerEmma\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tasks')->delete();

        Task::create(array('description' => 'Hacer el sistema.',
                'name'        => 'Desarrollar',
                'priority'    => '10',
                'state'       => 'En Proceso',
                'post_id'     => '1'
                ));
        Task::create(array('description' => 'Hacer la documentación del sistema.',
                'name'        => 'Documentación',
                'priority'    => '10',
                'state'       => 'En Proceso',
                'post_id'     => '1'
                ));
    }
}
