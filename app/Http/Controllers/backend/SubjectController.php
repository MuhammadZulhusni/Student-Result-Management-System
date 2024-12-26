<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function CreateSubject()
    {
        return view('backend.subject.create_subject_view');
    }
}
