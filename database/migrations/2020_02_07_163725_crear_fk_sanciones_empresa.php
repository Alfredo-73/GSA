<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearFkSancionesEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->biginteger('id_empleado')->lenght(20)->unsigned()->after('id_capataz');
            $table->foreign('id_empleado')->references('id')->on('empleados');

        });
        Schema::table('empresa', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->biginteger('id_empleado')->lenght(20)->unsigned()->after('domicilio');
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
        Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->dropColumn('id_empleado');
            $table->dropForeign('id_empleado');
        });

        Schema::table('empresa', function (Blueprint $table) {
            //
            $table->dropColumn('id_empleado');
            $table->dropForeign('id_empleado');

        });
    }
}
