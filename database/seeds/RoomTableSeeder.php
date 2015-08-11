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
            'price'       => '1200',
        ));
        $room->distributions()->sync([1]);
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//2
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 102',
            'location'    => 'Primer Piso Hab. 102',
            'available'   => '1',
            'price'       => '800',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//3
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 103',
            'location'    => 'Primer Piso Hab. 103',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '3'],
                                      2 => ['available' => '1',
                                            'order' => '1'],
                                      5 => ['available' => '1',
                                            'order' => '2']]);

        $room = Room::create(array(//4
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 104',
            'location'    => 'Primer Piso Hab. 104',
            'available'   => '1',
            'price'       => '1200',
        ));
        $room->distributions()->sync([2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//5
            'description' => 'Habitación con TV y cama simple.',
            'name'        => 'Habitación 105',
            'location'    => 'Primer Piso Hab. 105',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//6
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 106',
            'location'    => 'Primer Piso Hab. 106',
            'available'   => '1',
            'price'       => '1200',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '2'],
                                      2 => ['available' => '1',
                                            'order' => '3'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);


        $room = Room::create(array(//7
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 107',
            'location'    => 'Primer Piso  Hab. 107',
            'available'   => '1',
            'price'       => '800',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '3'],
                                      2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//8
            'description' => 'Habitación con TV y cama simple.',
            'name'        => 'Habitación 201',
            'location'    => 'Segundo Piso Hab. 201',
            'available'   => '1',
            'price'       => '400',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '1']]);

        $room = Room::create(array(//9
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 202',
            'location'    => 'Segundo Piso Hab. 202',
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
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 203',
            'location'    => 'Segundo Piso  Hab. 203',
            'available'   => '1',
            'price'       => '800',
        ));
        $room->distributions()->sync([1 => ['available' => '1',
                                            'order' => '3'],
                                      2 => ['available' => '1',
                                            'order' => '2'],
                                      5 => ['available' => '1',
                                            'order' => '1']]);


        $room = Room::create(array(//10
            'description' => 'Habitación amplia con TV.',
            'name'        => 'Habitación 204',
            'location'    => 'Segundo Piso  Hab. 204',
            'available'   => '0',
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
