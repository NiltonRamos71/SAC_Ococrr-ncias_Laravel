<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id_municipio');
            $table->string('nome_municipio', 100);
            $table->integer('id_territorio_identidade');
            $table->integer('populacao');
            $table->integer('IDH');
            $table->integer('id_pc_proximo');
            $table->integer('id_pf_proximo');
            $table->integer('id_uf_ibge');
            $table->integer('id_municipio_ibge');
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
        Schema::dropIfExists('municipios');
    }
}
