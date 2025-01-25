<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\classes;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function index()
    {
        $classes = classes::all();
        return view('frontend.index', compact('classes'));
    }
}
