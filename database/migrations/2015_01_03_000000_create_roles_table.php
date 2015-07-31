<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Cargos (Role)
class CreateRolesTable extends Migration {

    /// Corre la Migración para crear la Tabla Cargos (Role).
    /*!
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug',100);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }

}
