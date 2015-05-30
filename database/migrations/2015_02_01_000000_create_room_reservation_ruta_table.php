<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomReservationRutaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reservation', function(Blueprint $table)
        {
            $table->integer('room_id')->unsigned();
            //$table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('reservation_id')->unsigned();
            //$table->foreign('reservation_id')->references('id')->on('reservations');
            $table->datetime('check_in');
            $table->datetime('check_out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('room_reservation');
    }

}
