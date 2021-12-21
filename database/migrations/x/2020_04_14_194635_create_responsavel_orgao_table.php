<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelOrgaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel_orgao', function (Blueprint $table) {
            $table->integer('id_responsavel');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id_unidade')->on('unidades');
            $table->integer('orgao_id')->unsigned();
            $table->foreign('orgao_id')->references('id_orgao')->on('orgaos');            
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
        Schema::dropIfExists('responsavel_orgao');
    }
}
