<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Habitaciones - Distribuciones (Room - Distribution)
class CreateRoomDistributionTable extends Migration {

    /// Corre la Migración para crear la Tabla Habitaciones - Distribuciones (Room - Distribution).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('room_distribution', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            //$table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('distribution_id')->unsigned();
            //$table->foreign('distribution_id')->references('id')->on('distributions');
            $table->integer('order')->unsigned();
            $table->boolean('available');
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('room_distribution');
    }

}
