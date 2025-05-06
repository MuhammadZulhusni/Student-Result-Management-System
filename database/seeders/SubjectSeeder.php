<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['subject_name' => 'Introduction to Programming', 'subject_code' => 'CS101'],
            ['subject_name' => 'Data Structures', 'subject_code' => 'CS102'],
            ['subject_name' => 'Database Systems', 'subject_code' => 'CS103'],
            ['subject_name' => 'Operating Systems', 'subject_code' => 'CS104'],
            ['subject_name' => 'Computer Networks', 'subject_code' => 'CS105'],
            ['subject_name' => 'Web Development', 'subject_code' => 'CS106'],
            ['subject_name' => 'Mobile Application Development', 'subject_code' => 'CS107'],
            ['subject_name' => 'Software Engineering', 'subject_code' => 'CS108'],
            ['subject_name' => 'Artificial Intelligence', 'subject_code' => 'CS109'],
            ['subject_name' => 'Cybersecurity Fundamentals', 'subject_code' => 'CS110']
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
