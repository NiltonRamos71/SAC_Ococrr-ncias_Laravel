<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacocorrencia.ocorrencias', function (Blueprint $table) {
            $table->increments('id_ocorrencia');
            $table->integer('responsavel_id')->unsigned();
            $table->foreign('responsavel_id')->references('id_responsavel')->on('responsaveis');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id_item')->on('tiposdeproblemas');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id_unidade')->on('unidades');
            $table->integer('orgao_id')->unsigned();
            $table->foreign('orgao_id')->references('id_orgao')->on('orgaos');
            $table->date('data_ocorrencia');
            $table->date('data_previsao_conclusao');
            $table->date('data_conclusao');
            $table->string('descricao_problema', 4000);
            $table->integer('status_ocorrencia_id')->unsigned();
            $table->foreign('status_ocorrencia_id')->references('id_status_ocorrencia')->on('status_ocorrencia');
            $table->integer('responsavel_tecnico_id')->unsigned();
            $table->foreign('responsavel_tecnico_id')->references('id_responsavel')->on('responsaveis');
            $table->integer('tombamento');
            $table->char('fechamento_automatico', 1)->default('N');
            $table->integer('item_id2');
            $table->string('solucao', 4000);
            $table->string('motivo_cancelamento', 4000);
            $table->date('data_cancelamento');
            $table->date('data_confirmacao');        
            $table->integer('avaliacao_id')->unsigned();
            $table->foreign('avaliacao_id')->references('id_avaliacao')->on('avaliacoes');
            $table->string('observacoes', 2000);
            $table->string('motivo_pendencia', 4000);
            $table->date('data_pendencia');
            $table->integer('responsavel_encerramento_id')->unsigned();
            $table->foreign('responsavel_encerramento_id')->references('id_responsavel')->on('responsaveis');
            $table->integer('area_atual_id')->unsigned();
            $table->foreign('area_atual_id')->references('id_area')->on('areas');
            $table->integer('responsavel_cancelar_id')->unsigned();
            $table->foreign('responsavel_cancelar_id')->references('id_responsavel')->on('responsaveis');
            $table->char('tipo_id', 1);
            $table->integer('cod_oco_cfq_id');
            $table->date('data_hora_inicio_ocorrencia');
            $table->date('data_hora_final_ocorrencia');
            $table->integer('cod_criticidade_id');
            $table->date('data_atendimento');
            $table->integer('prioridade_tecnico');
            $table->char('atendimento_interrompido', 1);
            $table->string('solucao_tecnica', 2000);
            $table->string('ip_solicitante', 15);
            $table->integer('unidade_servico_id')->unsigned();
            $table->foreign('unidade_servico_id')->references('id_unidade_servico')->on('unidadesdeservico');         
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
        Schema::dropIfExists('ocorrencias');
    }
}
