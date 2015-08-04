<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Permisos (Permission)
class CreatePermissionsTable extends Migration {

    /// Corre la Migración para crear la Tabla Permisos (Permission).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('permissions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('permissions');
    }

}
