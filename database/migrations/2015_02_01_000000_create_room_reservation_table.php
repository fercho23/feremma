<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Habitaciones - Reservas (Room - Reservation)
class CreateRoomReservationTable extends Migration {

    /// Corre la Migración para crear la Tabla Habitaciones - Reservas (Room - Reservation).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('room_reservation', function(Blueprint $table) {
            $table->integer('room_id')->unsigned();
            //$table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('reservation_id')->unsigned();
            //$table->foreign('reservation_id')->references('id')->on('reservations');
            $table->string('types_beds', 100);
            $table->tinyInteger('total_beds');
            $table->datetime('check_in');
            $table->datetime('check_out');
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('room_reservation');
    }

}
