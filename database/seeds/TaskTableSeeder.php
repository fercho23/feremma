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
                'attendant_id'=> '1',
                'priority'    => '10',
                'state'       => 'pendiente',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Hacer la documentación del sistema.',
                'name'        => 'Documentación',
                'priority'    => '10',
                'state'       => 'pendiente',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 1',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 2',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 3',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 4',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 5',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 6',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 7',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'realizada',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 8',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'en proceso',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 9',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'en proceso',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 10',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1'
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 11',
                'attendant_id'=> '1',
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1'
                ));
    }
}
