<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre', 100)->unique(); 
            $table->text('descripcion')->nullable(); 
            $table->string('codigo', 10)->unique(); 
            $table->string('ubicacion', 255)->nullable(); 
            $table->string('responsable', 100); 
            $table->string('telefono_responsable', 15); 
            $table->enum('estado', ['activa', 'inactiva'])->default('activa'); 
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
        Schema::dropIfExists('zonas');
    }
}
