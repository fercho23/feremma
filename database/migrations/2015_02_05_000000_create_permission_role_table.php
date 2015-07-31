<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Permisos -  Cargos (Permission - Role)
class CreatePermissionRoleTable extends Migration {

    /// Corre la Migración para crear la Tabla Permisos -  Cargos (Permission - Role).
    /*!
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('permission_id');
            $table->integer('role_id');
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
    }

}
