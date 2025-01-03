<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function AddStudent()
    {
        $classes = classes::get();
        return view('backend.student.add_student_view', compact('classes'));
    }

    public function StoreStudent(Request $request)
    {
        // dd($request->all());
        $student = New Student();                                                
        $student->name = $request->full_name;                             
        $student->email = $request->email;         
        $student->roll_id = $request->roll_id;     
        $student->class_id = $request->class;                             
        $student->dob = $request->dob;         
        $student->gender = $request->gender;          
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');                                                    // Retrieve the uploaded file from the request                                            
            $imageName = date('YmdHi').'.'.$file->getClientOriginalName();                   // Generate a unique image name using the current date and original file name
            $file->move(public_path('uploads/student_photos'), $imageName);   // Move the uploaded file to the 'uploads/student_photos' directory in the public path
            $student['photo'] = $imageName;                                                          // Assign the generated image name to the student's photo attribute                                      
        }

        $student->save();     

        // Notification message
        $notification = array(
            'message' => 'New Students Successfully Added!',                
            'alert-type' => 'success'                                          
        );

        return redirect()->back()->with($notification);   
    }
}
