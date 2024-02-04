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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->comment('reference users');
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();

            $table->string('nama_ibu')->nullable();
            $table->string('nisn')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nik')->nullable();

            $table->unsignedBigInteger('agama_id')->nullable();

            $table->unsignedBigInteger('jenis_tinggal_id')->nullable();
            $table->unsignedBigInteger('kewarganegaraan')->nullable();
            $table->unsignedBigInteger('pendidikan_terkahir_id')->nullable();


            $table->enum('status_nikah', ['sudah', 'belum'])->nullable();
            $table->unsignedBigInteger('sumber_info_id', ['sudah', 'belum'])->nullable();

            $table->tinyInteger('step')->default(0);
            $table->boolean('is_beasiswa')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
