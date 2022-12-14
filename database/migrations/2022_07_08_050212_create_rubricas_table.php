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
        Schema::create('rubricas', function (Blueprint $table) {
            $table->id();
            $table->string('elabora_nombre', 80)->default('');
            $table->string('elabora_cargo', 80)->default('');
            $table->string('vobo_nombre', 80)->default('');
            $table->string('vobo_cargo',80)->default('');
            $table->string('autoriza_nombre',80)->default('');
            $table->string('autoriza_cargo',80)->default('');
            $table->string('rubricas', 32)->default('');
            $table->integer('habilitado')->default(0);
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
        Schema::dropIfExists('rubricas');
    }
};
