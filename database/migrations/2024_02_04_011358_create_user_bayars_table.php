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
        Schema::create('user_bayars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftarans')->cascadeOnDelete()->comment('reference users');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->comment('reference users');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->string('virtual_account', )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bayars');
    }
};
