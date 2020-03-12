<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaFKVs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->foreign('id_capataz')->references('id')->on('capataces');
            $table->foreign('id_sanciones')->references('id')->on('sanciones');

        });
        Schema::table('cosechas', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_capataz')->references('id')->on('capataces');
        });
        Schema::table('sanciones', function (Blueprint $table) {
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->foreign('id_capataz')->references('id')->on('capataces');
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropforeign('id_empresa');
            $table->dropforeign('id_capataz');
            $table->dropforeign('id_sanciones');
        });
        Schema::table('cosechas', function (Blueprint $table) {
            $table->dropforeign('id_cliente');
            $table->dropforeign('id_capataz');
        });
        Schema::table('sanciones', function (Blueprint $table) {
            $table->dropforeign('id_empresa');
            $table->dropforeign('id_capataz');
           $table->dropforeign('id_empleado');
        });
    }
}
