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
<<<<<<< HEAD
            $table->date("fecha_envio");
            $table->string("contenido");


=======
            $table->string('Descripcion');
>>>>>>> 15e2533231d26e4dfc4d9a9944d81039f87268cb
            $table->timestamps();
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
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
