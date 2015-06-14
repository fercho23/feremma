<?php

use FerEmma\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ServiceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('services')->delete();

        Service::create(array('description'    => 'Acceso al Spa mayores de 18 años (sauna seco, baño finlandés, duchas escocesas, sala de relax, piscina climatizada, gimnasio).',
                 'name'     => 'Acceso al Spa',
                 'price'  => '214.20'                    
                 ));
        Service::create(array('description'    => 'Acceso diario a la piscina del hotel. Incluye Toallas',
                 'name'     => 'Acceso a la Piscina',
                 'price'  => '35.00'                    
                 ));

    }

}
