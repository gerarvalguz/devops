<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProyectosYCatalogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('estatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion', 1000);
            $table->string('slug')->nullable();
            $table->unsignedInteger('proyecto_id'); //Paso 1 para llave foránea           
            $table->foreign('proyecto_id')->references('id')->on('tipo_proyecto'); //Paso 2 crea y asocia la columna con una relación
            $table->unsignedInteger('estatus_id'); //Paso 1 para llave foránea           
            $table->foreign('estatus_id')->references('id')->on('estatus'); //Paso 2 crea y asocia la columna con una relación     
            $table->unsignedInteger('user_id'); //Paso 1 para llave foránea           
            $table->foreign('user_id')->references('id')->on('users'); //Paso 2 crea y asocia la columna con una relación
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
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('estatus');
        Schema::dropIfExists('tipo_proyecto');
    }
}
