<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $genders = ['Male', 'Female'];
        $classes = Classe::pluck('id')->toArray(); // Get all class IDs

        for ($i = 1; $i <= 100; $i++) {
            Student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'roll_id' => strtoupper(Str::random(8)),
                'class_id' => fake()->randomElement($classes),
                'dob' => fake()->date('Y-m-d', '2005-01-01'),
                'photo' => null,
                'gender' => fake()->randomElement($genders),
                'status' => fake()->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
