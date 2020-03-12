<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('legajo')->lenght(20);
            $table->string('nombre')->lenght(255);
            $table->string('apellido')->lenght(255);
            $table->integer('dni')->lenght(11);
            $table->biginteger('cuil')->lenght(20);
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
            $table->bigInteger('id_empresa')->lenght(20)->unsigned();
            $table->bigInteger('id_capataz')->lenght(20)->unsigned();
            $table->bigInteger('id_sanciones')->lenght(20)->unsigned();
            $table->string('avatar')->lenght(255)->nullable();

            $table->string('observacion')->lenght(255)->nullable();

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
        Schema::dropIfExists('empleados');
    }
}
