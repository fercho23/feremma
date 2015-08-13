<?php

use FerEmma\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {

    public function run() {
        DB::table('tasks')->truncate();

        Task::create(array(//1
            'name'        => 'Limpiar Habitación 101',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(//2
            'name'        => 'Limpiar pisos pasillo 3',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
        ));
        Task::create(array(//3
            'name'        => 'Limpiar Habitación 203',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
        ));
        Task::create(array(//4
            'name'        => 'Limpiar Habitación 103',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '4',
            'created_at'  => date("Y-m-d")
        ));

        Task::create(array(//5
            'name'        => 'Inodoro tapado Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(//6
            'name'        => 'Pintar paredes Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(//7
            'name'        => 'Arreglar ventana Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
        ));
        Task::create(array(//8
            'name'        => 'Arreglar calefactor Habitación 204',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '5',
            'created_at'  => date('Y-m-d', strtotime('-3 day'))
        ));

        Task::create(array(//9
            'name'        => 'Despertar Habitación 102',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '3',
            'created_at'  => date("Y-m-d")
        ));
        Task::create(array(//10
            'name'        => 'Recibir contingente de personas de la empresa Viajes Felices',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '3',
            'created_at'  => date("Y-m-d")
        ));


        Task::create(array(//11
            'name'        => 'Ordenar facturas',
            'description' => '',
            'attendant_id'=> null,
            'priority'    => '',
            'state'       => 'pendiente',
            'role_id'     => '2',
            'created_at'  => date('Y-m-d')
        ));
        Task::create(array(//12
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
