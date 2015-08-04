<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Servicios (Service)
class CreateServicesTable extends Migration {

    /// Corre la Migración para crear la Tabla Servicios (Service).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('services');
    }

}
