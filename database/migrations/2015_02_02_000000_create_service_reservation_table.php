<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Servicios - Reservaciones (Service - Reservation)
class CreateServiceReservationTable extends Migration {

    /// Corre la Migración para crear la Tabla Servicios - Reservaciones (Service - Reservation).
    /*!
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
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->string('name', 100);
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down()
    {
        Schema::drop('service_reservation');
    }

}
