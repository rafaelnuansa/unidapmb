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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->comment('reference users');
            $table->string('nomor_registrasi')->unique();
            $table->foreignId('periode_id')->references('id')->on('periodes')->cascadeOnDelete()->comment('reference periods');
            $table->foreignId('jurusan_1_id')->references('id')->on('jurusans')->cascadeOnDelete()->comment('reference jurusans');
            $table->foreignId('jurusan_2_id')->references('id')->on('jurusans')->cascadeOnDelete()->comment('reference jurusans');
            $table->foreignId('jurusan_3_id')->references('id')->on('jurusans')->cascadeOnDelete()->comment('reference jurusans');
            $table->foreignId('kelas_id')->references('id')->on('kelas')->cascadeOnDelete()->comment('reference kelas');


            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();

            $table->boolean('is_cancel')->default(false);
            // Beasiswa
            $table->string('beasiswa_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
