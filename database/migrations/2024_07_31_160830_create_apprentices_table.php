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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentices');
    }
};
