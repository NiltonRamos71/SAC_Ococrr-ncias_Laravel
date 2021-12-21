<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsaveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->increments('id_responsavel');
            $table->string('nome_responsavel', 70);
            $table->string('nome_reduzido', 50);
            $table->string('chave_acesso', 50);
            $table->integer('unidade_atual_id')->unsigned();
            $table->foreign('unidade_atual_id')->references('id_unidade')->on('unidades');
            $table->integer('tipo_responsavel_id')->unsigned();
            $table->foreign('tipo_responsavel_id')->references('id_tipo_responsavel')->on('responsavel_tipo');  
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id_grupo')->on('grupos');
            $table->string('email_responsavel', 50);
            $table->integer('id_unidade_simpas');
            $table->integer('id_secretaria_simpas');
            $table->string('cpf_responsavel', 11);
            $table->integer('gestor_cfq');
            $table->integer('nunca_alterar_senha');
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
        Schema::dropIfExists('responsaveis');
    }
}
