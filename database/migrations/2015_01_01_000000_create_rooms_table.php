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
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('types_beds', 100);
            $table->tinyInteger('total_beds');
            $table->string('location', 150);
            $table->text('plan');
            $table->boolean('available');
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
