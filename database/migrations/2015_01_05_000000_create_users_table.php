<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Usuarios (User)
class CreateUsersTable extends Migration {

    /// Corre la Migración para crear la Tabla Usuarios (User).
    /*!
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('username', 100);
            $table->string('name', 150);
            $table->string('surname', 150);
            $table->string('email', 100)->unique();
            $table->string('dni', 20);
            $table->string('address', 300);
            $table->string('phone', 20);
            $table->string('cuil', 20);
            $table->date('birthday');
            $table->string('password', 60);
            $table->char('sex', 1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
