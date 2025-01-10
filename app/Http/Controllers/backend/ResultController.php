<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\classes;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function AddResult()
    {
        $classes = classes::all();
        return view('backend.result.add_result_view', compact('classes'));  // Displays the 'add_result_view' page for adding result
    }
}
