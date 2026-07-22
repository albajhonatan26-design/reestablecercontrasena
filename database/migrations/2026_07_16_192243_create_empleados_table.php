<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('idempleado');
            $table->unsignedBigInteger('iddepartamento');
            $table->unsignedBigInteger('idciudad');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('direccion',35)->nullable(); //esto es para colocar que no sea obligatorio
            $table->string('email',50);
            $table->string('estado',10);
            $table->date('fechaingreso');
            $table->date('fecharetiro')->nullable();
            $table->decimal('sueldo',12,0);
            $table->timestamps();

            $table->foreign('iddepartamento')
                    ->references('iddepartamento')
                    ->on('departamentos');

            $table->foreign('idciudad')
                    ->references('idciudad')
                    ->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
