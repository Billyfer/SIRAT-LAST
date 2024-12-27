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
        Schema::create('data_jamaahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_keberangkatan');
            $table->date('tanggal_kepulangan');
            $table->string('paket')->nullable();
            $table->string('hotel_madinah')->nullable();
            $table->string('hotel_mekkah')->nullable();
            $table->string('program')->nullable();
            $table->integer('harga')->nullable();
            $table->string('pesawat')->nullable();
            $table->integer('total_seat')->nullable();
            $table->integer('terisi')->nullable();
            $table->integer('sisa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jamaahs');
    }
};
