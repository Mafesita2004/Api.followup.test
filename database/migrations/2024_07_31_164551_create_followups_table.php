<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $table->string('Fecha_Inicio');
        $table->string('Fecha_Fin');
        $table->string('Etapa_practica');
        $table->integer('Bitacoras');
        $table->string('Informe_visita');

        $table->unsignedBigInteger('trainer_id');
        $table->unsignedBigInteger('superadmin_id');
        $table->unsignedBigInteger('apprentice_id')->unique();

        $table->timestamps();

        $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
        $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
        $table->foreign('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade');
    });

    // Suponiendo que ya existen registros en las tablas trainers, superadmins y apprentices
    // Asegúrate de que los valores para 'apprentice_id' sean únicos y existentes en la tabla 'apprentices'
    $followups = [];

    for ($i = 1; $i <= 100; $i++) {
        $followups[] = [
            'Evaluación_de_progreso' => 'Evaluación ' . $i,
            'Actividades_Realizadas' => rand(1, 10),
            'Fecha_Inicio' => '2024-01-' . str_pad(rand(1, 30), 2, '0', STR_PAD_LEFT),
            'Fecha_Fin' => '2024-12-' . str_pad(rand(1, 30), 2, '0', STR_PAD_LEFT),
            'Etapa_practica' => 'Etapa ' . $i,
            'Bitacoras' => rand(1, 5),
            'Informe_visita' => 'Informe ' . $i,
            'trainer_id' => rand(1, 100), // Ajusta según el número de registros en la tabla 'trainers'
            'superadmin_id' => rand(1, 10), // Ajusta según el número de registros en la tabla 'superadmins'
            'apprentice_id' => $i, // Asumiendo que 'apprentice_id' es único y corresponde a un ID existente
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('followups')->insert($followups);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followups');
    }
};
