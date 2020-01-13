<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BorrarCampoQuincena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('control', function ($table) {
             $table->renameColumn('quincena', 'nombre_quincena');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('control', function ($table) {
             $table->renameColumn('nombre_quincena', 'quincena');
        });
    }
}
