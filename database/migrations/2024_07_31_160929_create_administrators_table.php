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
        Schema::create('administrators', function (Blueprint $table) {
            // DATOS BASICOS
            $table->id();
            $table->string('Name');
            $table->string('Last_name');
            $table->string('Cedula');
            $table->string('Email');
            $table->string('Cell_phone');

            // LUGAR DE RESIDENCIA
            $table->string('Country');
            $table->string('Department');
            $table->string('Municipality');
            $table->string('Neighborhood');
            $table->string('Address ');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
