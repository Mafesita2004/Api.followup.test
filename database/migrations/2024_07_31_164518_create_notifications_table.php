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
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->string('fecha_envio');
        $table->string('contenido');

        $table->foreignId('id_superadmin')->references('id')->on('superadmins')->onDelete('cascade');
        $table->foreignId('id_administrator')->references('id')->on('administrators')->onDelete('cascade');
        $table->foreignId('id_trainer')->references('id')->on('trainers')->onDelete('cascade');
        $table->foreignId('id_apprentice')->references('id')->on('apprentices')->onDelete('cascade');
        $table->timestamps();
    });

    // Suponiendo que ya existen registros en las tablas superadmins, administrators, trainers, y apprentices
    // Ajusta los rangos según la cantidad de registros en las tablas correspondientes
    $notifications = [];

    for ($i = 1; $i <= 100; $i++) {
        $notifications[] = [
            'fecha_envio' => '2024-09-' . str_pad(rand(1, 30), 2, '0', STR_PAD_LEFT),
            'contenido' => 'Contenido de la notificación ' . $i,
            'id_superadmin' => rand(1, 10), // Ajusta según el número de superadmins existentes
            'id_administrator' => rand(1, 100), // Ajusta según el número de administrators existentes
            'id_trainer' => rand(1, 100), // Ajusta según el número de trainers existentes
            'id_apprentice' => rand(1, 100), // Ajusta según el número de apprentices existentes
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('notifications')->insert($notifications);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
