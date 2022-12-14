<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('capturas', function (Blueprint $table) {
            //
            
            $table->string('calle',80)->default('');
            $table->string('numero_ext',32)->default('');
            $table->string('numero_int',32)->nullable()->default(' ');
            $table->string('colonia',80)->default('');
            $table->string('municipio',80)->default('');
            $table->integer('codigo_postal')->nullable();
            $table->string('estado',32)->default('OAXACA');
            $table->string('telefono',32)->nullable()->default('');
            $table->string('genero')->nullable();
            $table->string('civil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capturas', function (Blueprint $table) {
            //
        });
    }
};
