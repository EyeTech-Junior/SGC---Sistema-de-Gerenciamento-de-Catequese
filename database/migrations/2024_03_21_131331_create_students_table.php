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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameFile')->nullable();
            $table->string('padrinho')->nullable();
            $table->string('madrinha')->nullable();
            $table->string('email');
            $table->string('status')->default(0);
            $table->string('identification')->unique();
            $table->string('address')->nullable();;
            $table->string('phone');
            $table->string('observation')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom');
    }
};
