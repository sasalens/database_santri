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
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Memastikan tabel ini menggunakan engine InnoDB
            $table->id(); // Primary Key
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->text('address');
            $table->string('national_id', 16)->nullable();
            $table->string('religion')->default('Islam');
            $table->enum('status', ['Aktif', 'Alumni'])->default('Aktif');
            $table->string('photo')->nullable();
            $table->foreignId('guardian_id')->nullable()->constrained('student_guardians')->onDelete('set null'); // Foreign Key
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
