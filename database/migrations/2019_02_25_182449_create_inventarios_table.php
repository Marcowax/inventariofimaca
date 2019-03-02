<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre_equipo', 50)->nullable($value = true);
			$table->string('serial', 50)->nullable($value = false);
			$table->string('marca', 30)->nullable($value = false);
			$table->string('modelo', 30)->nullable($value = false);
			$table->string('tipo', 30)->nullable($value = false);
			$table->string('ubicacion', 30)->nullable($value = false);
			$table->date('fecha_registro')->nullable($value = false);
			$table->enum('activo', ['Sí', 'No'])->nullable($value = false);
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
        Schema::dropIfExists('inventarios');
    }
}
