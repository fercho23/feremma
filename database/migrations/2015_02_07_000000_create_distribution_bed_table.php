<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//! Migración para la Tabla de Distribuciones - Camas (Distribution - Bed)
class CreateDistributionBedTable extends Migration {

    /// Corre la Migración para crear la Tabla Habitaciones - Distribuciones (Distribution - Bed).
    /*!
     * @return void
     */
    public function up() {
        Schema::create('distribution_bed', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_id')->unsigned();
            //$table->foreign('distribution_id')->references('id')->on('distributions');
            $table->integer('bed_id')->unsigned();
            //$table->foreign('bed_id')->references('id')->on('beds');
            $table->integer('amount')->unsigned();
            $table->timestamps();
        });
    }

    /// Reverse the migrations.
    /*!
     * @return void
     */
    public function down() {
        Schema::drop('distribution_bed');
    }

}