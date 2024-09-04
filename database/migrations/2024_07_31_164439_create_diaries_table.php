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
    Schema::create('diaries', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('telephone');
        $table->unsignedBigInteger('trainer_id')->nullable();
        $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
        $table->timestamps();
    });

    // Suponiendo que ya hay entrenadores en la tabla 'trainers'
    // Si necesitas generar 'trainers' primero, asegúrate de hacerlo antes de este paso
    $diaries = [];

    for ($i = 1; $i <= 100; $i++) {
        $diaries[] = [
            'name' => 'DiaryName' . $i,
            'email' => 'diary' . $i . '@example.com',
            'telephone' => '321654' . str_pad($i, 3, '0', STR_PAD_LEFT),
            'trainer_id' => rand(1, 100), // Asumiendo que hay 100 entrenadores existentes
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('diaries')->insert($diaries);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
