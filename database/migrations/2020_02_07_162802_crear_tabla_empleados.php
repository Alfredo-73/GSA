<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpleados extends Migration
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
            $table->integer('legajo')->lenght(20)->unique();
            $table->string('nombre')->lenght(100);
            $table->string('apellido')->lenght(100);
            $table->integer('dni')->lenght(8);
            $table->biginteger('cuil')->lenght(20);
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->integer('id_empresa')->lenght(10)->unsigned();
            $table->foreign("id_empresa")->references("id")->on("empresa");
            $table->integer('id_capataz')->lenght(10)->unsigned();
            $table->foreign("id_capataz")->references("id")->on("capataz");
            $table->biginteger('id_sanciones')->lenght(20)->unsigned();
            $table->foreign('id_sanciones')->references('id')->on('sanciones');
            
            $table->string('avatar')->lenght(100);

            $table->string('observaciones')->lenght(200);
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
