<?php

use FerEmma\Bed;
use Illuminate\Database\Seeder;

class BedTableSeeder extends Seeder {

    public function run() {
        DB::table('beds')->truncate();

        Bed::create(array(//1
            'name'          => 'Single',
            'description'   => 'El soporte de una cama individual mide 39 pulgadas (1 metro) de ancho por 75 pulgadas (1,90 metros) de largo.',
            'total_persons' => '1',
            'price'         => '100',
        ));

        Bed::create(array(//2
            'name'          => 'Double',
            'description'   => 'Los soportes para una cama matrimonial miden 53 pulgadas (1,35 metros) de ancho y 75 pulgadas (1,90 metros) de largo.',
            'total_persons' => '2',
            'price'         => '200',
        ));

        Bed::create(array(//3
            'name'          => 'Queen',
            'description'   => 'Los soportes para una cama tamaño queen miden 60 pulgadas (1,5 metros) de ancho y 80 pulgadas (2 metros) de largo.',
            'total_persons' => '2',
            'price'         => '250',
        ));

        Bed::create(array(//4
            'name'          => 'King',
            'description'   => 'Los marcos para una cama king son aparentemente cuadrados, ya que miden 76 pulgadas (1,90 metros) de ancho y 80 pulgadas (2 metros) de largo.',
            'total_persons' => '2',
            'price'         => '300',
        ));



    }

}
