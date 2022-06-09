<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Materia;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('foto')->nullable();
            $table->json('materias')->nullable();
            $table->boolean('discapacidad')->nullable();
            $table->boolean('militar')->nullable();
            $table->boolean('cambio')->nullable();
            $table->boolean('embarazo')->nullable();
            $table->string('sexo')->nullable();
            $table->date('ingreso')->nullable();
            $table->date('periodo_actual')->nullable();
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
        Schema::dropIfExists('students');
    }
};
