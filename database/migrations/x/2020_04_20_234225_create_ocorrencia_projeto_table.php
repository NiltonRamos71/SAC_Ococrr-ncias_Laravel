<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_projeto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OCO_PRO_ID')->unsigned();
            $table->foreign('OCO_PRO_ID')->references('id_responsavel')->on('responsaveis');
            //$table->integer('OCO_PRO_ID');
            $table->string('OCO_PRO_DESCRICAO', 100);
            $table->char('OCO_PRO_TIPO', 1);
            //$table->"OCO_PRO_TIPO" CHAR(1 BYTE);
            $table->integer('OCO_PRO_COD_CRITICIDADE'); 
            $table->string('OCO_PRO_COMPLEMENTO', 2000); 
            $table->integer('OCO_PRO_ID_STATUS_PROJETO');
            $table->integer('OCO_PRO_RESPONSAVEL_SOLICI_ID')->unsigned();
            $table->foreign('OCO_PRO_RESPONSAVEL_SOLICI_ID')->references('id_responsavel')->on('responsaveis');
            //$table->integer('OCO_PRO_COD_RESPONSAVEL_SOLICI'),
            $table->dateTime('OCO_PRO_DATA_SOLICITACAO')->nullable(); 
            //$table->"OCO_PRO_DATA_SOLICITACAO" DATE,
            $table->integer('OCO_PRO_RESPONSAVEL_DELEGA_ID')->unsigned();
            $table->foreign('OCO_PRO_RESPONSAVEL_DELEGA_ID')->references('id_responsavel')->on('responsaveis');            
            //$table->integer('OCO_PRO_COD_RESPONSAVEL_DELEGA'), 
            $table->dateTime('OCO_PRO_DATA_DELEGACAO')->nullable();
            //$table->"OCO_PRO_DATA_DELEGACAO" DATE, 
            $table->string('OCO_PRO_OBSERVACOES_DELEGACAO', 2000); 
            $table->integer('OCO_PRO_RESPONSAVEL_TECNIC_ID')->unsigned();
            $table->foreign('OCO_PRO_RESPONSAVEL_TECNIC_ID')->references('id_responsavel')->on('responsaveis');
            //$table->integer('OCO_PRO_COD_RESPONSAVEL_TECNIC'), 
            $table->integer('OCO_PRO_RESPONSAVEL_CANCEL_ID')->unsigned();
            $table->foreign('OCO_PRO_RESPONSAVEL_CANCEL_ID')->references('id_responsavel')->on('responsaveis');
            //$table->integer('OCO_PRO_COD_RESPONSAVEL_CANCEL'), 
            $table->dateTime('OCO_PRO_DATA_CANCELAMENTO')->nullable();
            //"OCO_PRO_DATA_CANCELAMENTO" DATE, 
            $table->string('OCO_PRO_DESCRICAO_CANCELAMENTO', 2000);
            $table->dateTime('OCO_PRO_PRAZO_INICIAL')->nullable();
            //"OCO_PRO_PRAZO_INICIAL" DATE, 
            $table->integer('OCO_PRO_UNIDADE_ID')->unsigned();
            $table->foreign('OCO_PRO_UNIDADE_ID')->references('id_unidade')->on('unidades');
            //$table->integer('OCO_PRO_COD_UNIDADE'), 
            $table->integer('OCO_PRO_ORGAO_ID')->unsigned();
            $table->foreign('OCO_PRO_ORGAO_ID')->references('id_orgao')->on('orgaos');
            //$table->integer('OCO_PRO_COD_ORGAO'), 
            $table->integer('OCO_PRO_AREA_ATUAL_ID')->unsigned();
            $table->foreign('OCO_PRO_AREA_ATUAL_ID')->references('id_area')->on('areas');
            //$table->integer('OCO_PRO_AREA_ATUAL'), 
            $table->integer('OCO_PRO_ITEM_ID')->unsigned();
            $table->foreign('OCO_PRO_ITEM_ID')->references('id_item')->on('tiposdeproblemas');
            //$table->integer('OCO_PRO_COD_ITEM'), 
            $table->dateTime('OCO_PRO_DATA_ENCERRAMENTO')->nullable();
            //"OCO_PRO_DATA_ENCERRAMENTO" DATE, 
            $table->integer('OCO_PRO_COD_AVALIACAO'); 
            $table->string('OCO_PRO_DESCRICAO_AVALIACAO', 1000);
            $table->dateTime('OCO_PRO_DATA_ATENDIMENTO')->nullable();
            //"OCO_PRO_DATA_ATENDIMENTO" DATE, 
            $table->string('OCO_PRO_OBSER_ENCERRAMENTO', 1000); 
            $table->integer('OCO_PRO_RESPONSAVEL_AVALI_ID')->unsigned();
            $table->foreign('OCO_PRO_RESPONSAVEL_AVALI_ID')->references('id_responsavel')->on('responsaveis');
            //$table->integer('OCO_PRO_COD_RESPONSAVEL_AVALI'), 
            $table->string('OCO_PRO_TITULO', 100);
            $table->string('OCO_PRO_JUSTIFICATIVA', 100);
            $table->integer('OCO_PRO_PRIORIDADE_USUARIO');
            $table->dateTime('OCO_PRO_DATA_SUGERIDA')->nullable();
            //"OCO_PRO_DATA_SUGERIDA" DATE, 
            $table->dateTime('OCO_PRO_PRAZO_FINAL')->nullable();
            //"OCO_PRO_PRAZO_FINAL" DATE
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
        Schema::dropIfExists('ocorrencia_projeto');
    }
}
