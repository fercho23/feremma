<?php

use FerEmma\Reservation;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('reservations')->truncate();

        $reservation = Reservation::create(array(
            'owner_id'    => '1',
            'total_price' => '500',
            'sign'        => '400',
            'due'         => '100',
            'check_in'    => '2015-02-01',
            'check_out'   => '2015-02-04',
            ));
        $reservation->rooms()->sync([1]);

        $service = DB::table('services')->find(1);

        $reservation->services()->sync([ $service->id => ['name'=>$service->name,
                                                          'quantity'=>'5',
                                                          'price'=>'200']
                                       ]);

        $reservation = Reservation::create(array(
            'owner_id'    => '3',
            'total_price' => '1500',
            'sign'        => '500',
            'due'         => '1000',
            'check_in'    => '2015-01-01',
            'check_out'   => '2015-01-03',
            ));
        $reservation->rooms()->sync([1, 3]);

        $service1 = DB::table('services')->find(2);
        $service2 = DB::table('services')->find(4);
        $service3 = DB::table('services')->find(6);

        $reservation->services()->sync([ $service1->id => ['name'=>$service1->name,
                                                          'quantity'=>'2',
                                                          'price'=>$service1->price
                                                          ],
                                         $service2->id => ['name'=>$service2->name,
                                                          'quantity'=>'3',
                                                          'price'=>$service2->price
                                                          ],
                                         $service3->id => ['name'=>$service3->name,
                                                          'quantity'=>'1',
                                                          'price'=>$service3->price
                                                          ],
                                       ]);

        $reservation->booking()->sync([4, 5, 6]);


    }

}
