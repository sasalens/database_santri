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
        Schema::create('student_health_records', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('blood_type', 3)->nullable(); // A, B, AB, O
            $table->text('medical_history')->nullable();
            $table->text('allergies')->nullable();
            $table->string('emergency_contact', 15)->nullable();
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_health_records');
    }
};
