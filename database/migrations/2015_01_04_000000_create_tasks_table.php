<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Tareas (Task)
class CreateTasksTable extends Migration {

    /// Corre la Migración para crear la Tabla Tareas (Task).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->tinyInteger('priority');
            $table->string('state', 20);
            $table->integer('role_id')->unsigned();
            $table->integer('attendant_id')->unsigned();
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('tasks');
    }

}
