<?php

use FerEmma\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder {

    public function run() {
        DB::table('services')->truncate();

        Service::create(array(//1
            'description'  => 'Acceso al Spa mayores de 18 años (sauna seco, baño finlandés, duchas escocesas, sala de relax, piscina climatizada, gimnasio).',
            'name'         => 'Acceso al Spa',
            'price'        => '200.00'
        ));

        Service::create(array(//2
            'description'  => 'Acceso diario a la piscina del hotel. Incluye Toallas',
            'name'         => 'Acceso a la Piscina',
            'price'        => '50.00'
        ));

        Service::create(array(//3
            'description'  => 'Pensión completa.',
            'name'         => 'Pensión completa',
            'price'        => '100.00'
        ));

        Service::create(array(//4
            'description'  => 'Media pensión.',
            'name'         => 'Media pensión',
            'price'        => '50.00'
        ));

        Service::create(array(//5
            'description'  => 'Merienda para 1 persona.',
            'name'         => 'Merienda',
            'price'        => '40.00'
        ));

        Service::create(array(//6
            'description'  => 'Cena para 1 persona.',
            'name'         => 'Cena',
            'price'        => '80.00'
        ));

        Service::create(array(//7
            'description'  => 'Acceso a la sala de juegos por 1 día.',
            'name'         => 'Sala de juegos',
            'price'        => '25.00'
        ));

        Service::create(array(//8
            'description'  => 'Acceso a la sala de juegos por 1 semana.',
            'name'         => 'Sala de juegos por 1 semana',
            'price'        => '150.00'
        ));

        Service::create(array(//9
            'description'  => 'Acceso a la cochera por auto por 1 día.',
            'name'         => 'Estadía Auto',
            'price'        => '50.00'
        ));

        Service::create(array(//10
            'description'  => 'Acceso a la cochera por auto por 1 semana.',
            'name'         => 'Estadía por semana Auto',
            'price'        => '300.00'
        ));

        Service::create(array(//11
            'description'  => 'Acceso a la cochera por auto por 1 mes.',
            'name'         => 'Estadía por mes Auto',
            'price'        => '1200.00'
        ));

        Service::create(array(//12
            'description'  => 'Acceso a la cochera por camioneta por 1 día.',
            'name'         => 'Estadía Camioneta',
            'price'        => '75.00'
        ));

        Service::create(array(//13
            'description'  => 'Acceso a la cochera por camioneta por 1 semana.',
            'name'         => 'Estadía por semana Camioneta',
            'price'        => '450.00'
        ));

        Service::create(array(//14
            'description'  => 'Acceso a la cochera por camioneta por 1 mes.',
            'name'         => 'Estadía por mes Camioneta',
            'price'        => '2000.00'
        ));

        Service::create(array(//15
            'description'  => 'Tour turistico por la cuidad.',
            'name'         => 'Tour turistico',
            'price'        => '400.00'
        ));

        Service::create(array(//16
            'description'  => 'Servicio de guardería de niños hasta 3 años.',
            'name'         => 'Guardería',
            'price'        => '500.00'
        ));

        Service::create(array(//17
            'description'  => 'Acceso a la piscina del hotel por 1 semana. Incluye Toallas',
            'name'         => 'Acceso a la Piscina por 1 semana',
            'price'        => '300.00'
        ));

    }

}
