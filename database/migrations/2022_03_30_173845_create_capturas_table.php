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
        Schema::create('capturas', function (Blueprint $table) {
            $table->string('rfc', 13);
            $table->string('nombre', 80);
            $table->string('clave_presupuestal', 32);
            $table->integer('cr');
            $table->string('estructura', 10);
            // datos antecedentes
            $table->string('rfc_sustituto',13)->nullable();
            $table->string('nombre_sustituto', 80)->nullable();
            $table->string('clave_sustituto',32)->nullable();
            $table->string('cr_sustituto', 10)->nullable();
            $table->date('efectos_del')->nullable();
            $table->date('efectos_al')->nullable();
            $table->integer('motivo')->nullable();
            //
            $table->date('elaboracion');
            $table->string('lote',10)->nullable()->default('');
            $table->integer('documento')->nullable();
            $table->integer('horas')->default(8);
            $table->integer('movimiento');
            $table->integer('tipo_movimiento');
            $table->integer('tipo_trabajador');
            $table->date('vigencia_del');
            $table->date('vigencia_al')->nullable();
            $table->text('justificacion')->nullable()->default('');
            $table->string('elabora_nombre', 80);
            $table->string('elabora_cargo', 80);
            $table->string('vobo_nombre', 80);
            $table->string('vobo_cargo', 80);
            $table->string('autoriza_nombre', 80);
            $table->string('autoriza_cargo', 80);
            $table->string('rubricas');
            
            $table->primary(array('rfc','vigencia_del','movimiento'));
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
        Schema::dropIfExists('capturas');
    }
};
