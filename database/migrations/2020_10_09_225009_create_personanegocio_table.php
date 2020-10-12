<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonanegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personanegocio', function (Blueprint $table) {
            $table->integer('id_persona')->unsigned();
            $table->integer('id_negocio')->unsigned();
            $table->primary(['id_persona','id_negocio']);
            $table->foreign('id_negocio')->references('id')->on('negocios');
            $table->foreign('id_persona')->references('carnet')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personanegocio');
    }
}
