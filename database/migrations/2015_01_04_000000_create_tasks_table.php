<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->tinyInteger('priority');
            $table->string('state', 20);
            $table->integer('role_id')->unsigned();
            $table->integer('attendant_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }

}
