<?php

use FerEmma\Reservation;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder {

    public function run() {
        DB::table('reservations')->truncate();
        DB::table('reservation_user')->truncate();
        DB::table('room_reservation')->truncate();
        DB::table('service_reservation')->truncate();

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//1
            'owner_id'       => '8',
            'total_price'    => '2300',//300*5 + 200*1 + 50*2 + 100*5
            'sign'           => '1300',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('-20 day')),
            'check_out'      => date("Y-m-d", strtotime('-15 day')),
            'real_check_in'  => date('Y-m-d', strtotime('-20 day')),
            'real_check_out' => date('Y-m-d', strtotime('-15 day')),
            'created_at'     => date('Y-m-d', strtotime('-20 day')),
            'updated_at'     => date('Y-m-d', strtotime('-15 day')),
            ));

        $reservation->rooms()->sync([ 1 => ['distribution_id' => 1,
                                            'price' => '300'
                                           ]]);

        $reservation->services()->sync([ 1 => ['name' => 'Acceso al Spa',
                                               'quantity' => '1',
                                               'price' => '200'],
                                         2 => ['name' => 'Acceso a la Piscina',
                                               'quantity' => '2',
                                               'price' => '50'],
                                         3 => ['name' => 'Pensión completa',
                                               'quantity' => '5',
                                               'price' => '100'],
                                       ]);

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//2
            'owner_id'       => '9',
            'total_price'    => '4300',//400*7 + 150*1 + 300*1 + 100*7 +50*7
            'sign'           => '2300',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('-21 day')),
            'check_out'      => date("Y-m-d", strtotime('-14 day')),
            'real_check_in'  => date('Y-m-d', strtotime('-21 day')),
            'real_check_out' => date('Y-m-d', strtotime('-14 day')),
            'created_at'     => date('Y-m-d', strtotime('-21 day')),
            'updated_at'     => date('Y-m-d', strtotime('-14 day')),
            ));

        $reservation->rooms()->sync([ 2 => ['distribution_id' => 1,
                                            'price' => '400'
                                           ]]);

        $reservation->services()->sync([ 8  => ['name' => 'Sala de juegos por 1 semana',
                                                'quantity' => '1',
                                                'price' => '150'],
                                         10 => ['name' => 'Estadía por semana Auto',
                                                'quantity' => '1',
                                                'price' => '300'],
                                         3  => ['name' => 'Pensión completa',
                                                'quantity' => '7',
                                                'price' => '100'],
                                         2  => ['name' => 'Acceso a la Piscina',
                                                'quantity' => '7',
                                                'price' => '50'],
                                       ]);

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//3
            'owner_id'       => '10',
            'total_price'    => '3000',//300*6 + 100*6 + 50*4 + 400*1
            'sign'           => '1500',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('-18 day')),
            'check_out'      => date("Y-m-d", strtotime('-12 day')),
            'real_check_in'  => date('Y-m-d', strtotime('-18 day')),
            'real_check_out' => date('Y-m-d', strtotime('-12 day')),
            'created_at'     => date('Y-m-d', strtotime('-18 day')),
            'updated_at'     => date('Y-m-d', strtotime('-12 day')),
            ));

        $reservation->rooms()->sync([ 3 => ['distribution_id' => 1,
                                            'price' => '300'
                                           ]]);

        $reservation->services()->sync([ 3  => ['name' => 'Pensión completa',
                                                'quantity' => '6',
                                                'price' => '100'],
                                         2  => ['name' => 'Acceso a la Piscina',
                                                'quantity' => '4',
                                                'price' => '50'],
                                         15 => ['name' => 'Tour turistico',
                                                'quantity' => '1',
                                                'price' => '400'],
                                       ]);

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//4
            'owner_id'       => '11',
            'total_price'    => '8000',//600*8 + 300*1 + 200*2 + 50*6 + 400*2 + 100*14
            'sign'           => '3000',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('-10 day')),
            'check_out'      => date("Y-m-d", strtotime('-2 day')),
            'real_check_in'  => date('Y-m-d', strtotime('-10 day')),
            'real_check_out' => date('Y-m-d', strtotime('-2 day')),
            'created_at'     => date('Y-m-d', strtotime('-10 day')),
            'updated_at'     => date('Y-m-d', strtotime('-2 day')),
            ));
        $reservation->booking()->sync([12]);

        $reservation->rooms()->sync([ 4 => ['distribution_id' => 2,
                                            'price' => '600'
                                           ]]);

        $reservation->services()->sync([ 10 => ['name' => 'Estadía por semana Auto',
                                                'quantity' => '1',
                                                'price' => '300'],
                                         1  => ['name' => 'Acceso al Spa',
                                                'quantity' => '2',
                                                'price' => '200'],
                                         2  => ['name' => 'Acceso a la Piscina',
                                                'quantity' => '6',
                                                'price' => '50'],
                                         15 => ['name' => 'Tour turistico',
                                                'quantity' => '2',
                                                'price' => '400'],
                                         3  => ['name' => 'Pensión completa',
                                                'quantity' => '14',
                                                'price' => '100'],
                                       ]);

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//5
            'owner_id'       => '13',
            'description'    => 'Pareja con un niño pequeño.',
            'total_price'    => '8000',//600*10 + 200*2 + 50*6 + 400*2 + 500*1
            'sign'           => '3000',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('-10 day')),
            'check_out'      => date("Y-m-d"),
            'real_check_in'  => date('Y-m-d', strtotime('-10 day')),
            'created_at'     => date('Y-m-d', strtotime('-10 day')),
            ));
        $reservation->booking()->sync([14]);

        $reservation->rooms()->sync([ 5 => ['distribution_id' => 2,
                                            'price' => '600'
                                           ]]);

        $reservation->services()->sync([ 1  => ['name' => 'Acceso al Spa',
                                                'quantity' => '2',
                                                'price' => '200'],
                                         2  => ['name' => 'Acceso a la Piscina',
                                                'quantity' => '6',
                                                'price' => '50'],
                                         15 => ['name' => 'Tour turistico',
                                                'quantity' => '2',
                                                'price' => '400'],
                                         16 => ['name' => 'Guardería',
                                                'quantity' => '1',
                                                'price' => '500'],
                                       ]);

        // ------------------------------------------------------------- //
        $reservation = Reservation::create(array(//6
            'owner_id'       => '15',
            'description'    => 'Pareja con un niño pequeño.',
            'total_price'    => '13250',//600*7 + 200*8 + 50*12 + 400*2 + 500*3 + 450*7 + 100*14
            'sign'           => '8250',
            'due'            => '0',
            'check_in'       => date('Y-m-d', strtotime('+1 day')),
            'check_out'      => date("Y-m-d", strtotime('+8 day')),
            ));
        $reservation->booking()->sync([16]);

        $reservation->rooms()->sync([ 5 => ['distribution_id' => 2,
                                            'price' => '600'
                                           ]]);

        $reservation->services()->sync([ 1  => ['name' => 'Acceso al Spa',
                                                'quantity' => '8',
                                                'price' => '200'],
                                         2  => ['name' => 'Acceso a la Piscina',
                                                'quantity' => '12',
                                                'price' => '50'],
                                         15 => ['name' => 'Tour turistico',
                                                'quantity' => '2',
                                                'price' => '400'],
                                         16 => ['name' => 'Guardería',
                                                'quantity' => '3',
                                                'price' => '500'],
                                         13 => ['name' => 'Estadía por semana Camioneta',
                                                'quantity' => '7',
                                                'price' => '450'],
                                         3  => ['name' => 'Pensión completa',
                                                'quantity' => '14',
                                                'price' => '100'],
                                       ]);




    }

}
