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
        Schema::create('karyawans', function (Blueprint $table) {
        $table->id();
        $table->string('nama') ->nullable();
        $table->enum('role', ['Karyawan Pusat', 'Pimpinan Cabang', 'Karyawan Cabang,','Pimpinan Pusat']);
        $table->foreignId('cabang_id')->nullable()->constrained('data_perusahaans')->onDelete('cascade');
        $table->string('email')->unique();
        $table->string('no_wa') ->nullable();
        $table->string('alamat') ->nullable();
        $table->string('username')->unique();
        $table->string('password');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
