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
        Schema::create('student_clothes', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Relasi ke tabel students
            $table->string('shirt_size')->nullable(); // Ukuran baju (S, M, L, XL, dll.)
            $table->string('pants_size')->nullable(); // Ukuran celana
            $table->string('head_size')->nullable(); // Ukuran kepala (lingkar kepala)
            $table->string('shoe_size')->nullable(); // Ukuran sepatu
            $table->string('others')->nullable(); // Catatan ukuran tambahan (misalnya sarung, peci, dsb.)
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_clothes');
    }
};
