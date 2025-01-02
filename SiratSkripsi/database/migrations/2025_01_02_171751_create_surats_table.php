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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data_perusahaans')->nullable()->constrained('data_perusahaans')->onDelete('cascade');
            $table->foreignId('id_karyawans')->nullable()->constrained('karyawans')->onDelete('cascade');
            $table->string('keterangan');
            $table->string('dokumen_surat');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
