<?php

use FerEmma\Room;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder {

    public function run() {
        DB::table('rooms')->truncate();

        $room = Room::create(array(//1
            'description' => 'Suite Presidencial, con sauna, jacuzzi, frigobar, smart tv 3d, aire acondicionado y un negro que te abanica.',
            'name'        => 'Suite Eva Peron',
            'location'    => 'Primer Piso Hab. 10',
            'plan'        => 'No Disponible',
            'available'   => '1',
            'price'       => '500',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//2
            'description' => 'El espacio para el huésped es reducido hasta un bloque modular de plástico o de fibra de vidrio de apenas 2 metros de longitud, 1 metro de alto y 1,25 metros de ancho, siendo este suficiente espacio como para dormir. Las instalaciones incluyen una televisión, una consola y conexión inalámbrica a internet. El equipaje se almacena en unas taquillas, que se encuentran fuera del hotel. La privacidad se ve asegurada mediante el uso de una cortina o una puerta de fibra de vidrio en el extremo abierto de la cápsula. Los cuartos de baño son comunes.',
            'name'        => 'Cápsula',
            'location'    => 'Primer Subsuelo Hab. 4',
            'plan'        => 'No Disponible',
            'available'   => '1',
            'price'       => '200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '2'],
                                      2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '3']]);

        $room = Room::create(array(//3
            'description' => 'Posee todas las comodidades para un verdadero Cabeza de Termo !!!',
            'name'        => 'Suite Cabeza de Termo',
            'location'    => 'Ultimo Subsuelo Hab. 43',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '5000',
        ));
        $room->distributions()->sync([6 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//4
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 101',
            'location'    => 'Primer Piso Hab. 101',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '1200',
        ));
        $room->distributions()->sync([1]);
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//5
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 102',
            'location'    => 'Primer Piso Hab. 102',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '800',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//6
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 103',
            'location'    => 'Primer Piso Hab. 103',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '3'],
                                      2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//7
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 104',
            'location'    => 'Primer Piso Hab. 104',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '1200',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//8
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 105',
            'location'    => 'Primer Piso Hab. 105',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//9
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 106',
            'location'    => 'Primer Piso Hab. 106',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '1200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '2'],
                                      2 => ['available' => '1',
                                            'order' => '3'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);


        $room = Room::create(array(//10
            'description' => 'Habitación común con cosas.',
            'name'        => 'Habitación 107',
            'location'    => 'Primer Piso  Hab. 107',
            'plan'        => 'Disponible',
            'available'   => '1',
            'price'       => '800',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '3'],
                                      2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

    }
}
