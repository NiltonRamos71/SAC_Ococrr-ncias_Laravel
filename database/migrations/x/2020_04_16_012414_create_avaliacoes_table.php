<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->increments('id_avaliacao');
            $table->integer('questionario_id');
            $table->integer('visao_id'); 
            $table->integer('funcionario_avaliado_id'); 
            $table->integer('empresa_avaliada_id'); 
            $table->integer('funcionario_examinador_id'); 
            $table->date('mesano_referencia');
            $table->date('data_cadastro');
            $table->date('data_disponibilizacao'); 
            $table->date('data_respondido'); 
            $table->string('comentario', 600); 
            $table->decimal('nota', 4, 2); 
            $table->integer('idr_processado');
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
        Schema::dropIfExists('avaliacaos');
    }
}
