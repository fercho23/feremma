<?php

use FerEmma\Room;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder {

    public function run() {
        DB::table('rooms')->truncate();

        $room = Room::create(array(//1
            'description' => 'Habitación con TV y cama simple.',
            'name'        => 'Habitación 101',
            'location'    => 'Primer Piso Hab. 101',
            'available'   => '1',
            'price'       => '200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//2
            'description' => 'Habitación con TV, cama simple y ventana al exteriror',
            'name'        => 'Habitación 102',
            'location'    => 'Primer Piso Hab. 102',
            'available'   => '1',
            'price'       => '300',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//3
            'description' => 'Habitación con TV y cama simple.',
            'name'        => 'Habitación 103',
            'location'    => 'Primer Piso Hab. 103',
            'available'   => '1',
            'price'       => '200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);


        $room = Room::create(array(//4
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 104',
            'location'    => 'Primer Piso Hab. 104',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//5
            'description' => 'Habitación amplia con TV, Permite una cama simple para un niño pequeño',
            'name'        => 'Habitación 105',
            'location'    => 'Primer Piso Hab. 105',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1'],
                                      6 => ['available' => '1',
                                            'order' => '3']]);

        $room = Room::create(array(//6
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 106',
            'location'    => 'Primer Piso Hab. 106',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);


        $room = Room::create(array(//7
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 107',
            'location'    => 'Primer Piso Hab. 107',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//8
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 108',
            'location'    => 'Primer Piso Hab. 108',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//9
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 109',
            'location'    => 'Primer Piso Hab. 109',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);


        $room = Room::create(array(//10
            'description' => 'Habitación amplia con TV y cómoda con vista al exterior.',
            'name'        => 'Habitación 110',
            'location'    => 'Primer Piso Hab. 110',
            'available'   => '1',
            'price'       => '500',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);



        $room = Room::create(array(//11
            'description' => 'Habitación en Segundo Piso con TV y cama simple.',
            'name'        => 'Habitación 201',
            'location'    => 'Segundo Piso Hab. 201',
            'available'   => '1',
            'price'       => '200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//12
            'description' => 'Habitación en Segundo Piso con TV, cama simple y ventana al exteriror',
            'name'        => 'Habitación 202',
            'location'    => 'Segundo Piso Hab. 202',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//13
            'description' => 'Habitación en Segundo Piso con TV y cama simple.',
            'name'        => 'Habitación 203',
            'location'    => 'Segundo Piso Hab. 203',
            'available'   => '1',
            'price'       => '200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);


        $room = Room::create(array(//14
            'description' => 'Habitación en Segundo Piso amplia con TV.',
            'name'        => 'Habitación 204',
            'location'    => 'Segundo Piso Hab. 204',
            'available'   => '0',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//15
            'description' => 'Habitación en Segundo Piso amplia con TV.',
            'name'        => 'Habitación 205',
            'location'    => 'Segundo Piso Hab. 205',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//16
            'description' => 'Habitación en Segundo Piso amplia con TV.',
            'name'        => 'Habitación 206',
            'location'    => 'Segundo Piso Hab. 206',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);


        $room = Room::create(array(//17
            'description' => 'Habitación en Segundo Piso amplia con TV y cómoda con vista al exterior.',
            'name'        => 'Habitación 207',
            'location'    => 'Segundo Piso Hab. 207',
            'available'   => '1',
            'price'       => '500',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//18
            'description' => 'Habitación en Segundo Piso amplia con TV y cómoda con vista al exterior.',
            'name'        => 'Habitación 208',
            'location'    => 'Segundo Piso Hab. 208',
            'available'   => '1',
            'price'       => '500',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//19
            'description' => 'Habitación en Segundo Piso amplia con TV y cómoda con vista al exterior.',
            'name'        => 'Habitación 209',
            'location'    => 'Segundo Piso Hab. 209',
            'available'   => '1',
            'price'       => '500',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);


        $room = Room::create(array(//20
            'description' => 'Habitación de lujo en Segundo Piso amplia con TV y cómoda con vista al exterior.',
            'name'        => 'Habitación 210',
            'location'    => 'Segundo Piso Hab. 210',
            'available'   => '1',
            'price'       => '600',
        ));
        $room->distributions()->sync([3 => ['available' => '1',
                                            'order' => '1'],
                                      4 => ['available' => '1',
                                            'order' => '2']]);


    }
}
