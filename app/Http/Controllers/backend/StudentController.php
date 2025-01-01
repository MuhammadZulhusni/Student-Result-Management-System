<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function AddStudent()
    {
        $classes = classes::get();
        return view('backend.student.add_student_view', compact('classes'));
    }
}
