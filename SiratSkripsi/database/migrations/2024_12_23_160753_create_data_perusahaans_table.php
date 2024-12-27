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
        Schema::create('data_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cabang')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('nib_cabang')->nullable();
            $table->string('pdf_nib')->nullable();
            $table->string('pdf_akta_cabang')->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_perusahaans');
    }
};
