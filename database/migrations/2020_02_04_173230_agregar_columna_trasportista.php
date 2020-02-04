<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarColumnaTrasportista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cosecha', function (Blueprint $table) {
            $table->string('transportista')->lenght(150)->after('supervisor');

            //
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
        Schema::table('cosecha', function (Blueprint $table) {
            $table->dropcolumn('transportista');

            //
        });
    }
}
