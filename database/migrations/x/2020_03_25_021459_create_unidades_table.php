<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id_unidade');
            $table->string('nome_unidade', 50);
            $table->integer('senha_eletronica');
            $table->string('nome_reduzido', 30);
            $table->integer('dia_limite_estatistica');
            $table->string('endereco', 100);
            $table->string('numero', 10);
            $table->string('bairro', 30);
            $table->string('complemento', 50);
            $table->string('municipio', 100); 
            $table->string('cep', 8);
            $table->string('telefone', 20);
            $table->string('fax', 15);
            $table->string('horario_funcionamento', 200);
            $table->date('data_inauguracao');
            $table->string('nome_arquivo_foto', 20);
            $table->integer('tipo_unidade_id')->unsigned();
            $table->foreign('tipo_unidade_id')->references('id_tipo_unidade')->on('tipo_unidade');             
            $table->date('data_minima_estatistica');
            $table->date('data_maxima_estatistica');
            $table->integer('id_coordenador_dos');
            $table->decimal('total_area_interna', 10,2);
            $table->decimal('total_area_comum', 10,2);
            $table->decimal('total_area_externa', 10,2);
            $table->decimal('total_area_utilizada', 10,2);
            $table->integer('exibir_tipo');
            $table->string('email', 100);
            $table->float('constante_eletrica');
            $table->integer('municipio2_id')->unsigned();
            $table->foreign('municipio2_id')->references('id_municipio')->on('municipios'); 
            $table->string('unigeolocalizacao', 50);
            $table->string('possui_agendamento', 1);
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
        Schema::dropIfExists('unidades');
    }
}
