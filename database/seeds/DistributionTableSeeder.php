<?php

use FerEmma\Distribution;
use Illuminate\Database\Seeder;

class DistributionTableSeeder extends Seeder {

    public function run() {
        DB::table('distributions')->truncate();

        $dis = Distribution::create(array(//1
            'name'          => 'Single',
            'description'   => 'Posee solo una cama Simple.',
        ));
        $dis->beds()->sync([ 1 => ['amount' => 1] ]);

        $dis = Distribution::create(array(//2
            'name'          => 'Double',
            'description'   => 'Posee solo una cama Doble.',
        ));
        $dis->beds()->sync([ 2 => ['amount' => 1] ]);

        $dis = Distribution::create(array(//3
            'name'          => 'Queen',
            'description'   => 'Posee solo una cama Tamaño Queen.',
        ));
        $dis->beds()->sync([ 3 => ['amount' => 1] ]);

        $dis = Distribution::create(array(//4
            'name'          => 'King',
            'description'   => 'Posee solo una cama Tamaño King.',
        ));
        $dis->beds()->sync([ 4 => ['amount' => 1] ]);

        $dis = Distribution::create(array(//5
            'name'          => 'Twin',
            'description'   => 'Posee Dos camas Simples.',
        ));
        $dis->beds()->sync([ 1 => ['amount' => 2] ]);

        $dis = Distribution::create(array(//6
            'name'          => 'Reyes',
            'description'   => 'Posee 2 Camas una King para él y una Queen para ella.',
        ));
        $dis->beds()->sync([ 4 => ['amount' => 1],
                             3 => ['amount' => 1]]);

    }

}
