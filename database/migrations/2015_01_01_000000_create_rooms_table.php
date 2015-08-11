<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Habitaciones (Room)
class CreateRoomsTable extends Migration {

    /// Corre la Migración para crear la Tabla Habitaciones (Room).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('rooms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            $table->string('location', 150);
            $table->boolean('available')->default(1);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('rooms');
    }

}
