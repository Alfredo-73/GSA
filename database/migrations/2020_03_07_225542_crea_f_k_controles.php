<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaFKControles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('set null');;
            $table->foreign('quincena_id')->references('id')->on('quincenas')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->dropForeign('id_cliente');
            $table->dropForeign('quincena_id');
        });
    }
}
