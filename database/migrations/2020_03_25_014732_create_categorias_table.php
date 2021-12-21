<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacocorrencia.categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('divisao_id')->unsigned();
            $table->foreign('divisao_id')->references('id')->on('sacocorrencia.divisoes');
            $table->string('descricao', 150);            
            $table->char('ativo', 1)->default('S');           
            $table->integer('ordem');            
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
        Schema::dropIfExists('sacocorrencia.categorias');
    }
}
