<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregoCamposAControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->float('total_liquidacion')->lenght(12)->nullable();
            $table->float('orden_de_pago')->lenght(12)->nullable();
            $table->float('anticipo')->lenght(12)->nullable();
            $table->float('saldo')->lenght(12)->nullable();
            $table->float('total_pagado')->lenght(12)->nullable();
            $table->float('kilos')->lenght(12)->nullable();
            $table->float('iva')->lenght(12)->nullable();
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
