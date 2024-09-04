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
    Schema::create('superadmins', function (Blueprint $table) {
        $table->id();
        $table->integer('identificacion');
        $table->string('name');
        $table->string('last_name');
        $table->string('email');
        $table->string('password');
        $table->integer('phone');
        $table->string('address');
        $table->string('department');
        $table->string('municipality');
        $table->string('neighborhood');
        $table->string('country');
        $table->string('Birthdate');
        $table->timestamps();
    });

    $superadmins = [];

    for ($i = 1; $i <= 100; $i++) {
        $superadmins[] = [
            'identificacion' => 10000 + $i,
            'name' => 'SuperadminName' . $i,
            'last_name' => 'SuperadminLastName' . $i,
            'email' => 'superadmin' . $i . '@gmail.com',
            'password' => bcrypt('password' . $i),
            'phone' => '123456' . $i,
            'address' => 'Address ' . $i,
            'department' => 'Department' . $i,
            'municipality' => 'Municipality' . $i,
            'neighborhood' => 'Neighborhood' . $i,
            'country' => 'Country' . $i,
            'Birthdate' => '2000-01-' . str_pad($i, 2, '0', STR_PAD_LEFT),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    DB::table('superadmins')->insert($superadmins);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmins');
    }
};
