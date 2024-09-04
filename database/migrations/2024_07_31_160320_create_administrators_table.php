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
    Schema::create('administrators', function (Blueprint $table) {
        $table->id();
        $table->string('Name');
        $table->string('Last_name');
        $table->string('Cedula');
        $table->string('Email');
        $table->string('Cell_phone');
        $table->string('Country');
        $table->string('Departament');
        $table->string('Municipality');
        $table->string('Neighborhood');
        $table->string('Address');
        $table->foreignId('id_superadmin')->references('id')->on('superadmins')->onDelete('cascade');
        $table->timestamps();
    });

    $administrators = [];

    for ($i = 1; $i <= 100; $i++) {
        $administrators[] = [
            'Name' => 'Nombre' . $i,
            'Last_name' => 'Apellido' . $i,
            'Cedula' => 'Cedula' . $i,
            'Email' => 'email' . $i . '@gmail.com',
            'Cell_phone' => '123456789' . $i,
            'Country' => 'Country' . $i,
            'Departament' => 'Departament' . $i,
            'Municipality' => 'Municipality' . $i,
            'Neighborhood' => 'Neighborhood' . $i,
            'Address' => 'Address ' . $i,
            'id_superadmin' => 1, // Puedes cambiar esto según sea necesario
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('administrators')->insert($administrators);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
