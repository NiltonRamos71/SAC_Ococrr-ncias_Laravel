<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaCapturadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_capturada', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OCO_CAP_OCORRENCIA_ID')->unsigned();
            $table->foreign('OCO_CAP_OCORRENCIA_ID')->references('id_ocorrencia')->on('ocorrencias'); 
            $table->integer('responsavel_antigo_id')->unsigned();
            $table->foreign('responsavel_antigo_id')->references('id_responsavel')->on('responsaveis');
            $table->integer('responsavel_novo_id')->unsigned();
            $table->foreign('responsavel_novo_id')->references('id_responsavel')->on('responsaveis');                        
            $table->dateTime('data')->nullable()->useCurrent = true;
            $table->string('motivo', 1000);
            $table->integer('projeto_id')->unsigned(); 
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
        Schema::dropIfExists('ocorrencia_capturada');
    }
}
