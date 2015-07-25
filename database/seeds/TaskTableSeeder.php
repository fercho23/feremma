<?php

use FerEmma\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tasks')->truncate();

        Task::create(array('description' => 'Hacer el sistema.',
                'name'        => 'Desarrollar',
                'priority'    => '10',
                'state'       => 'En Proceso',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Hacer la documentación del sistema.',
                'name'        => 'Documentación',
                'priority'    => '10',
                'state'       => 'En Proceso',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 2',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 3',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 4',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 5',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 6',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 7',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 8',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 9',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 10',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 11',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
    }
}
