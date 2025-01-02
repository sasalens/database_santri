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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->year('graduation_year');
            $table->string('job')->nullable();
            $table->string('contact', 15)->nullable();
            $table->text('address')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
