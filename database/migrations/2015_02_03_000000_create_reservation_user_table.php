<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Reservaciones - Usuarios (Reservation - User)
class CreateReservationUserTable extends Migration {

    /// Corre la Migración para crear la Tabla Reservaciones - Usuarios (Reservation - User).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('reservation_user', function(Blueprint $table) {
            $table->integer('reservation_id')->unsigned();
            //$table->foreign('reservation_id')->references('id')->on('reservations');
            $table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('reservation_user');
    }

}
