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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_envio");
            $table->string("contenido");

            $table->foreignId('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
            $table->foreignId('administrator_id')->references('id')->on('administrators')->onDelete('cascade');
            $table->foreignId('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreignId('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
