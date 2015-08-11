<?php

use FerEmma\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder {

    public function run() {
        DB::table('services')->truncate();

        Service::create(array(//1
            'description'  => 'Acceso al Spa mayores de 18 años (sauna seco, baño finlandés, duchas escocesas, sala de relax, piscina climatizada, gimnasio).',
            'name'         => 'Acceso al Spa',
            'price'        => '214.20'
            ));

        Service::create(array(//2
            'description'  => 'Acceso diario a la piscina del hotel. Incluye Toallas',
            'name'         => 'Acceso a la Piscina',
            'price'        => '35.00'
            ));

        Service::create(array(//3
            'description'  => 'Media pensión.',
            'name'         => 'Media pensión',
            'price'        => '50.00'
            ));

        Service::create(array(//4
            'description'  => 'Merienda para 1 persona.',
            'name'         => 'Merienda',
            'price'        => '40.00'
            ));

        Service::create(array(//5
            'description'  => 'Cena para 1 persona.',
            'name'         => 'Cena',
            'price'        => '80.00'
            ));

        Service::create(array(//6
            'description'  => 'Acceso a la sala de juegos.',
            'name'         => 'Sala de juegos',
            'price'        => '25.00'
            ));

    }

}
