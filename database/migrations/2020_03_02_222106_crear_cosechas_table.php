<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearCosechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosechas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->date('fecha');
            $table->bigInteger('id_capataz')->unsigned()->nullable();
            $table->float('jornales')->lenght(12);
            $table->integer('cosecheros')->lenght(11);
            $table->float('bines')->lenght(12);
            $table->float('maletas')->lenght(12);
            $table->float('toneladas')->lenght(12);
            $table->float('prom_kg_bin')->lenght(12)->nullable();
            $table->string('supervisor')->lenght(255)->nullable();
            $table->string('transportista')->lenght(255)->nullable();
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
        Schema::dropIfExists('cosechas');
    }
}
