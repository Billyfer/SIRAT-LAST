<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_data_perusahaan')->nullable()->constrained('data_perusahaans')->onDelete('cascade'); 
            $table->enum('jenis_role', ['Karyawan Pusat', 'Kepala Cabang', 'Karyawan Cabang'])->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles'); 
    }
};
