<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaosXPostoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgaos_x_posto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orgao_id')->unsigned();
            $table->foreign('orgao_id')->references('id_orgao')->on('orgaos');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id_unidade')->on('unidades'); 
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
        Schema::dropIfExists('orgaos_x_posto');
    }
}
