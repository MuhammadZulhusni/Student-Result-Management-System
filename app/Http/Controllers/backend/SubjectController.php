<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\classes;

class SubjectController extends Controller
{
    // Method for display page 'create subject'
    public function CreateSubject()
    {
        return view('backend.subject.create_subject_view');
    }

    // Method for post data into database for created subject
    public function StoreSubject(Request $request)
    {
        $subject = New Subject();                                                // Create a new instance of the Subject model
        $subject->subject_name = $request->subject_name;                         // Assign the subject name from the request
        $subject->subject_code = $request->subject_code;                         // Assign the subject code from the request
        $subject->save();                                                        // Save the new subject record to the database

        // Notification message
        $notification = array(
            'message' => 'Subject Created Successfully!',                        // Success message
            'alert-type' => 'success'                                            // Alert type for success
        );

        return redirect()->route('manage.subjects')->with($notification);   // Redirect previous page with the success notification
    }

    public function ManageSubjects(Request $request)
    {
        $subjects = Subject::all();                                                                     // Retrieve all Subject records from the database
        return view('backend.subject.manage_subjects_view', compact('subjects')); // Pass the subjects data to the view | 'subjects' is the variable name.
    }

    public function EditSubject($id)
    {
        $subject = Subject::find($id);                                                                // Retrieve the subject with the specified ID
        // echo $subject;
        return view('backend.subject.edit_subject_view', compact('subject'));       // Return the edit view with subject data
    }

    // Controller method to handle updating a subject
    // Updates the subject record with the given ID using the submitted form data
    public function UpdateSubject(Request $request)
    {
        $id = $request->id;
        Subject::find($id)->update([                    // Find the subject by ID and update its details
            'subject_name' => $request->subject_name,       // Update the subject name
            'subject_code' => $request->subject_code        // Update the subject code
        ]);

        // Notification message
        $notification = array(
            'message' => 'Subject Updated Successfully!',         // Success message
            'alert-type' => 'success'                             // Alert type for success
        );

        return redirect()->route('manage.subjects')->with($notification);      // Redirect to manage subjects page with the success notification
    }

        // Deletes a subject record from the database
        public function DeleteSubject($id)
        {
            Subject::find($id)->delete();                                       // Finds the subject by its ID and removes it from the 'subjects' table
    
            // Notification message
            $notification = array(
                'message' => 'Subject Deleted Successfully!',                       // Success message
                'alert-type' => 'success'                                           // Alert type for success
            );
    
            return redirect()->back()->with($notification);   // Redirect previous page with the success notification
        }

        // Subject Combination All Methods
        public function AddSubjectCombination()
        {
            $classes = classes::all();
            $subjects = Subject::all();
            return view('backend.subject.add_subject_combination_view', compact('classes', 'subjects'));
        }
}
