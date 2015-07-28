<?php

use FerEmma\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder {

    public function run()
    {
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
            'description'  => 'Servicio tipo 1 que consta de . . .',
            'name'         => 'Servicio tipo 1',
            'price'        => '50.00'
            ));

        Service::create(array(//4
            'description'  => 'Servicio tipo 2 que consta de. . .',
            'name'         => 'Servicio tipo 2',
            'price'        => '75.00'
            ));

        Service::create(array(//5
            'description'  => 'Servicio tipo 3 que consta de . . .',
            'name'         => 'Servicio tipo 3',
            'price'        => '20500'
            ));

        Service::create(array(//6
            'description'  => 'Servicio tipo 4 que consta de. . .',
            'name'         => 'Servicio tipo 4',
            'price'        => '100.00'
            ));

    }

}
