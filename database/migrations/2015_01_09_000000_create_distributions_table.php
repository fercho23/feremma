<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Distribuciones (Distribution)
class CreateDistributionsTable extends Migration {

    /// Corre la Migración para crear la Tabla Distribuciones (Distribution).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('distributions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('distributions');
    }

}
