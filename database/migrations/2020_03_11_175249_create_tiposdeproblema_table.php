<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposdeproblemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacocorrencia.tiposdeproblema', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('sacocorrencia.categorias');            
            $table->string('descricao', 150);            
            $table->char('ativo', 1)->default('S');  
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('sacocorrencia.areas');                     
            $table->integer('nivel_tecnico');  
            $table->integer('ordem');              
            $table->integer('sla');  
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
        Schema::dropIfExists('sacocorrencia.tiposdeproblema');
    }
}
