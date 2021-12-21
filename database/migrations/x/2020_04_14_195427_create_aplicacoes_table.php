<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacoes', function (Blueprint $table) {
            $table->increments('id_aplicacao');
            $table->string('nome_aplicacao', 50);
            $table->string('URL', 80)->nullable();
            $table->string('sigla_aplicacao', 15)->nullable();
            $table->string('descricao', 500)->nullable();
            $table->string('parametros', 150)->nullable();          
            $table->integer('acesso_web')->nullable();  
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
        Schema::dropIfExists('aplicacoes');
    }
}
