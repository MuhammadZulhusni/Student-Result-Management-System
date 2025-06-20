<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    public function run(): void
    {
        $courseNames = [
            'Bachelor of Computer Science',
            'Diploma in Information Technology',
            'Bachelor of Software Engineering',
            'Diploma in Cybersecurity',
            'Bachelor of Artificial Intelligence',
            'Diploma in Multimedia Computing',
            'Bachelor of Data Science',
            'Diploma in Network Engineering',
            'Bachelor of Information Systems',
            'Diploma in Web Development'
        ];

        foreach ($courseNames as $course) {
            // Create 1 to 3 sections for each course
            $sections = rand(1, 3);
            for ($i = 1; $i <= $sections; $i++) {
                Classe::create([
                    'class_name' => $course,
                    'section' => $i
                ]);
            }
        }
    }
}
