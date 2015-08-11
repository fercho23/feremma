<?php

use FerEmma\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {

    public function run() {
        DB::table('tasks')->truncate();

        Task::create(array('description' => 'Hacer el sistema.',
                'name'        => 'Desarrollar',
                'attendant_id'=> null,
                'priority'    => '10',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Hacer la documentación del sistema.',
                'name'        => 'Documentación',
                'attendant_id'=> null,
                'priority'    => '10',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 1',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 2',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 3',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 4',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 5',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 6',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 7',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 8',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 9',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '1',
                'created_at'  => date('Y-m-d', strtotime('-8 day')),
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 10',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '4',
                'created_at'  => date("Y-m-d")
                ));
        Task::create(array('description' => 'Sin descripción',
                'name'        => 'Tarea 11',
                'attendant_id'=> null,
                'priority'    => '',
                'state'       => 'pendiente',
                'role_id'     => '4',
                'created_at'  => date('Y-m-d', strtotime('-8 day'))
                ));
    }
}
