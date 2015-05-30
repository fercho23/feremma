<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceReservationRutaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reservation', function(Blueprint $table)
        {
            $table->integer('service_id')->unsigned();
            //$table->foreign('service_id')->references('id')->on('services');
            $table->integer('reservation_id')->unsigned();
            //$table->foreign('reservation_id')->references('id')->on('reservations');
            $table->datetime('moment');
            $table->decimal('price', 10, 2);
            $table->string('name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_reservation');
    }

}
