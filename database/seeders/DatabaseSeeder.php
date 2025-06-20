<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminDataSeeder::class);   // Call the AdminDataSeeder to insert admin data into the database
        $this->call(ClasseSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
