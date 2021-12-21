<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesdeservicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadesdeservico', function (Blueprint $table) {
            $table->increments('id_unidade_servico');
            $table->string('nome_unidade_servico', 150);
            $table->integer('orgao_id')->unsigned();
            $table->foreign('orgao_id')->references('id_orgao')->on('orgaos');  
            $table->char('status', 1)->default('S'); 
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
        Schema::dropIfExists('unidadesdeservico');
    }
}
