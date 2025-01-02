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
        Schema::create('student_educations', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('education_level'); // e.g., Elementary, Junior High, Senior High
            $table->string('class'); // e.g., 7A, 10B
            $table->year('entry_year');
            $table->year('graduation_year')->nullable();
            $table->enum('graduation_status', ['Graduated', 'Not Graduated'])->nullable();
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_education');
    }
};
