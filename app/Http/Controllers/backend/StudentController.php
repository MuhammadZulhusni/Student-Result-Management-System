<?php

namespace App\Http\Controllers\backend;

use App\Models\Result;
use App\Models\classes;  // Try tukar ni jp and deploy
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

        return redirect()->route('manage.students')->with($notification);   
    }

    public function ManageStudents(Request $request)
    {
        $students = Student::all();                                                                  
        return view('backend.student.manage_student_view', compact('students')); 
    }

    public function EditStudent($id)
    {
        $classes = classes::all(); 
        $student = Student::find($id);                                                           
        // echo $student;
        return view('backend.student.edit_student_view', compact('student', 'classes'));   

    }

    public function UpdateStudent(Request $request)
    {
        $id = $request->id;
        
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Handle the photo upload if provided
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($student->photo && file_exists(public_path('uploads/student_photos/' . $student->photo))) {
                unlink(public_path('uploads/student_photos/' . $student->photo));
            }
    
            // Save the new photo
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/student_photos'), $filename);
            $student->photo = $filename;
        }
    
        // Update student details
        $student->update([
            'name' => $request->full_name,   
            'roll_id' => $request->roll_id,
            'email' => $request->email,
            'class_id' => $request->class_id,  
            'dob' => $request->dob,
            'gender' => $request->gender,
            'photo' => $student->photo ?? $student->photo, // If photo is not null, keep the current photo value (no change)
        ]);

        $student->save();
    
        // Notification message
        $notification = array(
            'message' => 'Student Details Updated Successfully!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('manage.students')->with($notification);
    }
    
    public function DeleteStudent($id)
    {
        $student = Student::find($id); 
        unlink(public_path('uploads/student_photos/' . $student->photo));   
        Result::where('student_id', $student->id);
        $student->delete();                          

        // Notification message
        $notification = array(
            'message' => 'Student Deleted Successfully!',                
            'alert-type' => 'success'                                         
        );

        return redirect()->back()->with($notification);  
    }
}

