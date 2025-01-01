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
            $table->id();
            $table->string('name')->nullable();         // Column for the student's name, allowing null values
            $table->string('email')->unique();          // Column for the student's email, ensuring unique values
            $table->string('roll_id')->nullable();      // Column for the student's roll number/ID, allowing null values
            $table->string('class_id')->nullable();     // Column for the class ID the student belongs to, allowing null values
            $table->string('dob')->nullable();          // Column for the student's date of birth (stored as a string), allowing null values
            $table->string('photo')->nullable();        // Column to store the path or URL of the student's photo, allowing null values
            $table->string('gender')->nullable();       // Column for the student's gender (e.g., Male/Female), allowing null values
            $table->enum('status', ['active', 'inactive'])->default('active');  // Enum column for the student's status with two possible values: 'active' or 'inactive'. Defaults to 'active'
            $table->timestamps();
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
