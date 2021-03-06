<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_proyectos', function (Blueprint $table) {
            $table->string('id_empresa',4);
            $table->string('ano_presupuesto',4);
            $table->string('id_proyecto',25);
            $table->string('nombre_proyecto');
            $table->string('tipo',1);

            //estableciendo la clave primaria primary key
            $table->primary(['id_empresa', 'ano_presupuesto', 'id_proyecto'], 'id_proyecto');

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
        Schema::dropIfExists('sfp_proyectos');
    }
}
