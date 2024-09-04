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
    Schema::create('apprentices', function (Blueprint $table) {
        $table->id();
        $table->integer('identification');
        $table->string('name');
        $table->string('lastname');
        $table->string('program');
        $table->string('ficha');
        $table->string('telephone');
        $table->string('email');
        $table->string('inicio_contrato');
        $table->string('fin_contrato');
        $table->string('nit_empresa');
        $table->string('razon_social');
        $table->string('address');
        $table->string('telephone_empresa');
        $table->string('name_trainer');
        $table->string('email_trainer');
        $table->timestamps();
    });

    $apprentices = [];

    for ($i = 1; $i <= 100; $i++) {
        $apprentices[] = [
            'identification' => 20000 + $i,
            'name' => 'ApprenticeName' . $i,
            'lastname' => 'ApprenticeLastName' . $i,
            'program' => 'Program' . $i,
            'ficha' => 'Ficha' . $i,
            'telephone' => '321654' . $i,
            'email' => 'apprentice' . $i . '@example.com',
            'inicio_contrato' => '2024-01-01',
            'fin_contrato' => '2024-12-31',
            'nit_empresa' => '80012345' . $i,
            'razon_social' => 'Empresa ' . $i,
            'address' => 'Address ' . $i,
            'telephone_empresa' => '312345' . $i,
            'name_trainer' => 'TrainerName' . $i,
            'email_trainer' => 'trainer' . $i . '@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('apprentices')->insert($apprentices);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentices');
    }
};
