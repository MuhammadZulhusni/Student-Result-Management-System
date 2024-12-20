<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function CreateClass(){
        return view('backend.class.create_class_view'); // Displays the 'create_class_view' page for adding a new class
    }
}
