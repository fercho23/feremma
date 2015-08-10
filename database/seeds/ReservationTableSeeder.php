<?php

use FerEmma\Reservation;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder {

    public function run() {
        DB::table('reservations')->truncate();

        $reservation = Reservation::create(array(
            'owner_id'    => '1',
            'total_price' => '6550',
            'sign'        => '4550',
            'due'         => '2000',
            'check_in'    => date('Y-m-d', strtotime('-2 day')),
            'check_out'   => date("Y-m-d"),
            'created_at'  => date('Y-m-d', strtotime('-4 day')),
            ));

        $reservation->rooms()->sync([ 3 => ['distribution_id' => 6,
                                            'price' => '5550'
                                           ]
                                    ]);

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
            'check_in'    => date("Y-m-d"),
            'check_out'   => date('Y-m-d', strtotime('+1 day')),
            'created_at'  => date('Y-m-d', strtotime('-2 day'))
            ));

        $reservation->rooms()->sync([ 1 => ['distribution_id' => 4,
                                            'price' => '800'
                                           ],
                                      2 => ['distribution_id' => 2,
                                            'price' => '400'
                                           ]
                                    ]);
        // $reservation->rooms()->sync([1, 3]);

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
