<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearNuevosCamposControles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->date('fecha')->nullable($value='true')->after('observacion');
            $table->float('nueve_treintayuno')->lenght(12)->nullable();
            $table->float('bines')->lenght(12)->nullable();
            $table->float('promedio')->lenght(12)->nullable();
            $table->float('diferencia')->lenght(12)->nullable();
            
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
