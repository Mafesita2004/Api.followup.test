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

        // DB::table('administrators')->insert([
        //     ["Name" => 'Juan'],
        // //     ['Last_name' => 'Gomez'],
        // //     ['Cedula' => '12345'],
        // //     ['Email' => 'juan@gmail.com'],
        // //     ['Cell_phone' => '321456789'],
        // //     ['Country' => 'Colombia'],
        // //     ['Departament' => 'Cauca'],
        // //     ['Municipality' => 'Popayan'],
        // //     ['Neighborhood' => 'Esmeralda'],
        // //     ['Address' => 'Calle #4'],
        //     ["id_superadmin" => 1]
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
