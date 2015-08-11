<?php

use FerEmma\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {

    public function run() {
        DB::table('tasks')->truncate();

        Task::create(array(
            'name'        => 'Limpiar Habitación 101',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(
            'name'        => 'Limpiar Habitación 103',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(
            'name'        => 'Limpiar Habitación 203',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
        ));

        Task::create(array(
            'name'        => 'Inodoro tapado Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(
            'name'        => 'Pintar paredes Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(
            'name'        => 'Arreglar ventana Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
        ));

        Task::create(array(
            'name'        => 'Despertar Habitación 102 ',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '2',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(
            'name'        => 'Ordenar facturas',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '2',
            'created_at'  => date('Y-m-d')
        ));
        Task::create(array(
            'name'        => 'Pagar servicios',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '2',
            'created_at'  => date('Y-m-d')
        ));


    }
}
