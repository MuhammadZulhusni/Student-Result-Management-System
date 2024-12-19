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
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                               // Create an auto-incrementing primary key column 'id'
            $table->string('name');                             // Create a 'name' column to store the user's name
            $table->string('email')->unique();                  // Create a 'unique' email column to store the user's email
            $table->timestamp('email_verified_at')->nullable(); // Create a nullable 'email_verified_at' column for email verification timestamp
            $table->string('password');                         // Create a 'password' column to store the user's hashed password
            $table->string('photo')->nullable();                // Create a nullable 'photo' column to store the user's profile picture filename
            $table->rememberToken();                                    // Create a 'remember_token' column for "remember me" functionality
            $table->timestamps();                                       // Create 'created_at' and 'updated_at' timestamp columns
        });
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
