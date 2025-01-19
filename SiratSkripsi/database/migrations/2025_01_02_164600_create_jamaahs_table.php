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
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paket')->nullable()->constrained('pakets')->onDelete('cascade');
            $table->foreignId('id_perusahaan')->nullable()->constrained('data_perusahaans')->onDelete('cascade');
            $table->foreignId('id_karyawan')->nullable()->constrained('karyawans')->onDelete('cascade');
            $table->string('nama_jamaah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ktp')->nullable();
            $table->integer('no_telpon')->nullable();
            $table->string('surat_kesehatan')->nullable();
            $table->string('visa')->nullable();
            $table->string('surat_pendukung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaahs');
    }
};
