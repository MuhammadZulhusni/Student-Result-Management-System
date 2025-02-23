<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "Admin",                          // Insert default admin name
            "email" => "admin@gmail.com",               // Insert default admin email
            "photo" => "no_image.png",                     // Insert default photo file name for the admin
            "password" => Hash::make("password") // Hash the password for security and insert
        ]);
    }
}
