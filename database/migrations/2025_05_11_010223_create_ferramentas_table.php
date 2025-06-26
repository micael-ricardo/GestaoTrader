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
        Schema::create('ferramentas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('versao', 20); 
            $table->enum('status', ['Ativa', 'Inativa']);
            $table->string('path', 255); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferramentas');
    }
};
