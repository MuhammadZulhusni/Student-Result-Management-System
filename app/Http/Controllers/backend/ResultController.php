<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function AddResult()
    {
        $classes = classes::all();
        return view('backend.result.add_result_view', compact('classes'));  // Displays the 'add_result_view' page for adding result
    }

    public function FetchStudent(Request $request)
    {
        // Retrieves the class_id from the request
        $class_id = $request->class_id;

        // Fetches students based on the class_id
        $students = Student::where('class_id', $class_id)->get();
    
        // Initializes the options for the student dropdown
        $std_data = '<option>-- Select a Student --</option>';
    
        // Loops through each student and appends them to the dropdown
        foreach($students as $student){
            $std_data .= '<option value="'.$student->id.'">'.$student->name.' | '.$student->roll_id.'</option>';
        }
    
        // Fetches the class and its associated subjects
        $class = classes::with('subjects')->where('id',  $class_id)->first();
        $class_subjects = $class->subjects;
    
        // Initializes an empty array to hold subject data
        for ($i = 0; $i < count($class_subjects); $i++) { 
            // Appends HTML for each subject with input fields for marks
            $subject_data[$i] = '
                <div class="flex items-center gap-4 p-4 border border-gray-200 shadow-sm rounded-md">
                    <div class="flex-1">
                        <h6 class="text-sm font-medium text-purple-700">'.$class_subjects[$i]->subject_name.'</h6>
                        <p class="text-xs text-gray-500">Enter marks for this subject</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="subject_ids[]" value="'.$class_subjects[$i]->id.'">
                        <input type="text" name="marks[]" class="form-control border-gray-300 rounded-md shadow-sm w-28 p-2 text-sm" placeholder="Marks (out of 100)" required>
                    </div>
                </div>';
        }  
    
        // Returns the student dropdown and subject data as a JSON response
        return response()->json(['students'=>$std_data, 'subjects' => $subject_data]);
    }    
}
