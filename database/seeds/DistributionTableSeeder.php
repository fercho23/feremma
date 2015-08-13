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
            'name'          => 'Double y Simple',
            'description'   => 'Posee una cama Doble y una cama Simple.',
        ));
        $dis->beds()->sync([ 2 => ['amount' => 1],
                             1 => ['amount' => 1] ]);


        $dis = Distribution::create(array(//7
            'name'          => 'Triple',
            'description'   => 'Posee Tres camas Simples.',
        ));
        $dis->beds()->sync([ 1 => ['amount' => 3] ]);


        $dis = Distribution::create(array(//8
            'name'          => 'Queen y Simple',
            'description'   => 'Posee una cama Queen y una cama Simple.',
        ));
        $dis->beds()->sync([ 3 => ['amount' => 1],
                             1 => ['amount' => 1] ]);


        $dis = Distribution::create(array(//9
            'name'          => 'King y Simple',
            'description'   => 'Posee una cama King y una cama Simple.',
        ));
        $dis->beds()->sync([ 4 => ['amount' => 1],
                             1 => ['amount' => 1] ]);


        $dis = Distribution::create(array(//10
            'name'          => 'Reyes',
            'description'   => 'Posee una King y una Queen.',
        ));
        $dis->beds()->sync([ 4 => ['amount' => 1],
                             3 => ['amount' => 1]]);

    }

}
