<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifEmpleadosColumnas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->date('fecha_egreso')->nullable()->change();
            $table->biginteger('id_sanciones')->lenght(20)->unsigned()->nullable()->change();
            $table->integer('id_empresa')->lenght(10)->unsigned()->nullable()->change();
            $table->integer('id_capataz')->lenght(10)->unsigned()->nullable()->change();
            $table->biginteger('id_sanciones')->lenght(20)->unsigned()->nullable()->change();

            $table->string('avatar')->lenght(100)->nullable()->change();

            $table->string('observaciones')->lenght(200)->nullable()->change();


        });
        Schema::table('empresa', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->biginteger('id_empleado')->lenght(20)->unsigned()->nullable()->change();
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
            //
        });
    }
}
