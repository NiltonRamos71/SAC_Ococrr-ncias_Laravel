<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaProjetoAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_projeto_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PROJETO_ATI_OCORRENCIA_ID')->unsigned();
            $table->foreign('PROJETO_ATI_OCORRENCIA_ID')->references('id_ocorrencia')->on('ocorrencias');
            $table->string('OCO_ATI_OBSERVACOES', 2000);
            $table->integer('OCO_ATI_RESPONSAVEL_ID')->unsigned();
            $table->foreign('OCO_ATI_RESPONSAVEL_ID')->references('id_responsavel')->on('responsaveis'); 
            $table->dateTime('OCO_ATI_DATA_INICIAL')->nullable();
            $table->dateTime('OCO_ATI_DATA_FINAL')->nullable(); 
            $table->char('OCO_ATI_STATUS', 1); 
            $table->string('OCO_ATI_NOME', 50); 
            $table->integer('OCO_ATI_HORAS_DEMANDADAS');
            $table->integer('OCO_ATI_PESO');
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
        Schema::dropIfExists('ocorrencia_projeto_atividade');
    }
}
