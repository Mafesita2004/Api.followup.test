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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->integer('identification_card');
            $table->string('email');
            $table->integer('cell_phone');
            $table->string('program');
            $table->integer('total_hours');
            $table->integer('hours_worked');
            $table->string('start_date');
            $table->string('ending_date');
            $table->string('country');
            $table->string('department');
            $table->string('municipality');
            $table->string('neighborhood');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
