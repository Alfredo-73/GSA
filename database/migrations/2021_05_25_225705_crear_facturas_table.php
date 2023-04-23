<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quincena_controles')->nullable();
            $table->unsignedBigInteger('quincena_id')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->bigInteger('num_factura')->lenght(20)->nullable();
            $table->float('importe')->lenght(12)->nullable();
            $table->float('retencion')->lenght(12)->nullable();
            $table->float('monto_cobrado')->lenght(12)->nullable();
            $table->float('gasto_bancario')->lenght(12)->nullable();
            $table->float('libre_dispon')->lenght(12)->nullable();
            $table->float('pago_personal')->lenght(12)->nullable();
            $table->float('pago_transporte')->lenght(12)->nullable();
            $table->float('toneladas')->lenght(12)->nullable();
            $table->string('observacion')->lenght(300)->nullable();
            $table->date('fecha')->nullable($value = 'true');
            $table->float('nueve_treintayuno')->lenght(12)->nullable();
            $table->float('bines')->lenght(12)->nullable();
            $table->float('promedio')->lenght(12)->nullable();
            $table->float('diferencia')->lenght(12)->nullable();
            $table->float('importe_a_pagar')->lenght(12)->nullable();
            $table->float('cantidad_cosecheros')->lenght(12)->nullable();
            $table->float('importe_cosecheros')->lenght(12)->nullable();
            $table->float('cantidad_jornales')->lenght(12)->nullable();
            $table->float('importe_jornales')->lenght(12)->nullable();
            $table->float('cantidad_capataces')->lenght(12)->nullable();
            $table->float('importe_capataces')->lenght(12)->nullable();
            $table->float('cantidad_colectivos')->lenght(12)->nullable();
            $table->float('importe_colectivos')->lenght(12)->nullable();
            $table->float('cantidad_maletas')->lenght(12)->nullable();
            $table->float('cantidad_bines')->lenght(12)->nullable();
            $table->float('cantidad_horas')->lenght(12)->nullable();
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
        Schema::dropIfExists('facturas');
    }
}
