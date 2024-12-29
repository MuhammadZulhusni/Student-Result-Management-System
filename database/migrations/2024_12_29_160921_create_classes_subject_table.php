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
        // Migration to create the pivot table for classes and subjects
        // The pivot table (classes_subject) links the classes & subjects tables by storing their IDs, creating the connection between them.
        Schema::create('classes_subject', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classes_id');               // Foreign key referencing the 'classes' table
            $table->bigInteger('subject_id');               // Foreign key referencing the 'subjects' table
            $table->integer('status')->default(1);   // Status field, default value is 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_subject');
    }
};
