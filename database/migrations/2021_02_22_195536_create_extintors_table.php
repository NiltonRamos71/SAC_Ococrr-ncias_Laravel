<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtintorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacocorrencia.extintors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->integer('orgao_id')->unsigned();
            $table->foreign('orgao_id')->references('id')->on('orgaos');
            $table->char('tipo_id', 1)->unsigned();
            $table->foreign('tipo_id')->references('id')->on('sacocorrencia.extintortipos');
            $table->char('carga_id', 1)->unsigned();
            $table->foreign('carga_id')->references('id')->on('sacocorrencia.extintorcargas');               
            $table->string('ninmetro', 12);
            $table->string('ninmetro_old', 12);
            $table->integer('responsavel_id')->unsigned();
            $table->foreign('responsavel_id')->references('id')->on('responsaveis');   
            $table->date('data_lcto');
            $table->date('data_vcto');   
            $table->char('ativo', 1)->default('S');                     
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
        Schema::dropIfExists('sacocorrencia.extintors');
    }
}
