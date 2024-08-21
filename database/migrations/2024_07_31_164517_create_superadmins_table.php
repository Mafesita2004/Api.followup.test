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
            // $table->string('name');
            // $table->string('last_name');
            // $table->string('email');
            // $table->string('password');
            // $table->integer('phone');
            // $table->string('address');
            // $table->string('department');
            // $table->string('municipality');
            // $table->string('neighborhood');
            // $table->string('country');
            // $table->string('Birthdate');
            $table->timestamps();
        });

        DB::table('superadmins')->insert([
            ["identificacion" => 1234567]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmins');
    }
};
