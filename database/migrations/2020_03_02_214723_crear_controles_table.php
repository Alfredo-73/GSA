<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('controles');
    }
}
