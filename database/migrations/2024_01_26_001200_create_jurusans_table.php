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
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('jenjang_id')->references('id')->on('jenjangs')->cascadeOnDelete()->comment('reference jenjangs');
            $table->foreignId('fakultas_id')->references('id')->on('fakultas')->cascadeOnDelete()->comment('reference faculties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
