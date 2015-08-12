<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la tabla de Reservaciones (Reservation)
class CreateReservationsTable extends Migration {

    /// Corre la Migración para crear la Tabla Reservaciones (Reservation).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('reservations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            //$table->foreign('owner_id')->references('id')->on('users');
            $table->text('description')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('sign', 10, 2);
            $table->decimal('due', 10, 2);
            $table->date('check_in');
            $table->date('check_out');
            $table->datetime('real_check_in')->nullable()->default(null);
            $table->datetime('real_check_out')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('reservations');
    }

}
