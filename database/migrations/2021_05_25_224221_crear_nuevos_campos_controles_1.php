<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearNuevosCamposControles1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->unsignedBigInteger('id_empresa')->nullable()->after('diferencia');
            $table->float('importe_a_pagar')->lenght(12)->nullable()->after('id_empresa');
            $table->float('cantidad_cosecheros')->lenght(12)->nullable()->after('importe_a_pagar');
            $table->float('importe_cosecheros')->lenght(12)->nullable()->after('cantidad_cosecheros');
            $table->float('cantidad_jornales')->lenght(12)->nullable()->after('importe_cosecheros');
            $table->float('importe_jornales')->lenght(12)->nullable()->after('cantidad_jornales');
            $table->float('cantidad_capataces')->lenght(12)->nullable()->after('importe_jornales');
            $table->float('importe_capataces')->lenght(12)->nullable()->after('cantidad_capataces');
            $table->float('cantidad_colectivos')->lenght(12)->nullable()->after('importe_capataces');
            $table->float('importe_colectivos')->lenght(12)->nullable()->after('cantidad_colectivos');
            $table->float('cantidad_maletas')->lenght(12)->nullable()->after('importe_colectivos');
            $table->float('cantidad_bines')->lenght(12)->nullable()->after('cantidad_maletas');
            $table->float('cantidad_horas')->lenght(12)->nullable()->after('cantidad_bines');
            $table->unsignedBigInteger('id_factura')->nullable()->after('cantidad_horas');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controles');
    }
}
