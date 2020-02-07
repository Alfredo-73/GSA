<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPivoteEmpleadosSanciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_sanciones', function (Blueprint $table) {
            
                $table->biginteger('id_empleado')->length(20)->unsigned();
                $table->biginteger('id_sanciones')->length(20)->unsigned();

                $table->foreign('id_empleado')->references('id')->on('empleados');
                $table->foreign('id_sanciones')->references('id')->on('sanciones');
           
            
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_sanciones');
    }
}
