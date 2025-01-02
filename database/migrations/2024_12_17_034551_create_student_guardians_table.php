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
        Schema::create('student_guardians', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Memastikan tabel ini menggunakan engine InnoDB
            $table->id(); // Primary Key
            $table->string('father_name');
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name');
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('guardian_name')->nullable(); // Untuk wali pengganti jika tidak ada orang tua
            $table->string('guardian_relationship')->nullable(); // Hubungan wali dengan santri (contoh: Paman, Kakak)
            $table->string('guardian_phone')->nullable();
            $table->text('address');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_guardians');
    }
};
