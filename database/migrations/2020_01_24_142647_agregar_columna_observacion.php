<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarColumnaObservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->string('observacion')->lenght(300)->after('reincorporacion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->dropcolumn('observacion');
        });
    }
}
