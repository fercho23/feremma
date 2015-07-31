<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Usuarios - Tareas (User - Task)
class CreateUserTaskTable extends Migration {

    /// Corre la Migración para crear la Tabla Usuarios - Tareas (User - Task).
    /*!
     * @return void
     */
    public function up()
    {
        Schema::create('user_task', function(Blueprint $table)
        {
            $table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('task_id')->unsigned();
            //$table->foreign('task_id')->references('id')->on('tasks');
            $table->datetime('check_in');
            $table->datetime('check_out');
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down()
    {
        Schema::drop('user_task');
    }

}
