<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Camas (Bed)
class CreateBedsTable extends Migration {

    /// Corre la Migración para crear la Tabla Camas (Bed).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('beds', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('total_persons');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('beds');
    }

}
