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
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->string('Evaluación_de_progreso');
            $table->integer('Actividades_Realizadas');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Fin');
            $table->string('Etapa practica');
            $table->integer('Bitacoras');
            $table->date('Informe_visita');

            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('superadmin_id');
            $table->unsignedBigInteger('apprentice_id')->unique();

            $table->timestamps();

            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
            $table->foreign('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followups');
    }
};
