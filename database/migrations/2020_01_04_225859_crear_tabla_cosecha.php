<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCosecha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('cosecha', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('id_cliente')->unsigned();
            $table->date('fecha')->nullable();
            $table->integer('id_capataz')->unsigned();
            $table->integer('jornales')->lenght(5);
            $table->integer('cosecheros')->lenght(5);
            $table->integer('bines')->lenght(5);
            $table->integer('maletas')->lenght(5);

            $table->float('toneladas')->lenght(10);

            $table->float('prom_kg_bin')->lenght(10);
            $table->string('supervisor')->lenght(50);
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
        Schema::dropIfExists('cosecha');
        //
    }
}
