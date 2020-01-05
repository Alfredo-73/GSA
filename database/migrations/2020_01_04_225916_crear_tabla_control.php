<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quincena',)->lenght(2);
            $table->integer('id_cliente')->unsigned();
            $table->integer('num_factura')->lenght(10);
            $table->float('importe')->lenght(12);
            $table->float('retencion')->lenght(12);
            $table->float('monto_cobrado')->lenght(12);
            $table->float('gasto_bancario')->lenght(12);
            $table->float('libre_dispon')->lenght(12);
            $table->float('pago_personal')->lenght(12);
            $table->float('pago_transporte')->lenght(12);
            $table->float('toneladas')->lenght(12);
            $table->string('observacion')->lenght(300);
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control');
        //
    }
}
