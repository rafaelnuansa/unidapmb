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
        Schema::create('user_asal_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->comment('reference users');

            $table->unsignedBigInteger('jenis_sekolah_id')->nullable();
            $table->enum('status_sekolah', ['negeri', 'swasta'])->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('kota_sekolah')->nullable();
            $table->string('nisn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_asal_sekolahs');
    }
};
