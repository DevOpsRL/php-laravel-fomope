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
        Schema::create('plantillas', function (Blueprint $table) {
            $table->string('rfc', 13);
            $table->string('nombre', 150);
            $table->string('sexo',32);
            $table->string('estado_civil',32);
            $table->string('clave_presupuestal',32);
            $table->integer('cr');
            $table->string('estructura',5)->default(''); //grupo-funcion-subfucnion
            $table->string('tipo_trabajador', 3);
            $table->string('horas',8)->default('8');
            $table->string('rango',8)->default('3');
            $table->integer('movimiento')->default(0);
            $table->date('vigencia_del')->default('now()');
            $table->date('vigencia_al')->nullable();
            $table->string('lote',8)->nullable();
            $table->integer('documento')->default(0);
            $table->string('curp',18)->nullable();
            $table->integer('estatus')->default(0);
            $table->string('calle',80)->default('');
            $table->string('numero_ext',32)->default('');
            $table->string('numero_int',32)->default('');
            $table->string('colonia',80)->default('');
            $table->string('municipio',80)->default('');
            $table->integer('codigo_postal')->nullable();
            $table->string('estado',32)->default('OAXACA');
            $table->string('telefono',32)->default('');
            $table->primary(array('rfc', 'clave_presupuestal'));
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
        Schema::dropIfExists('plantillas');
    }
};
