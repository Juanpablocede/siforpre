<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpFuentesFinanciamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_fuentes_financiamientos', function (Blueprint $table) {
          $table->string('id_empresa',4);
          $table->string('ano_presupuesto',4);
          $table->string('id_fuente_financiamiento',25)->unique();
          $table->string('nombre_fuente_financiamiento')->unique();

          //estableciendo la clave primaria primary key
          $table->primary(['id_empresa', 'ano_presupuesto', 'id_fuente_financiamiento'], 'id_fuente_financiamiento');
          //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
          $table->foreign(['id_empresa'])->
                  references(['id_empresa'])->
                  on('sfp_empresas')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->integer('id_registro');

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
        Schema::dropIfExists('sfp_fuentes_financiamientos');
    }
}
