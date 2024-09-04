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

    $trainers = [];

    for ($i = 1; $i <= 100; $i++) {
        $trainers[] = [
            'name' => 'TrainerName' . $i,
            'last_name' => 'TrainerLastName' . $i,
            'identification_card' => 20000 + $i,
            'email' => 'trainer' . $i . '@example.com',
            'cell_phone' => '123456' . $i,
            'program' => 'Program ' . $i,
            'total_hours' => 100 + $i,
            'hours_worked' => rand(0, 100), // Random hours worked
            'start_date' => '2024-01-01',
            'ending_date' => '2024-12-31',
            'country' => 'Country' . $i,
            'department' => 'Department' . $i,
            'municipality' => 'Municipality' . $i,
            'neighborhood' => 'Neighborhood' . $i,
            'address' => 'Address ' . $i,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('trainers')->insert($trainers);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
