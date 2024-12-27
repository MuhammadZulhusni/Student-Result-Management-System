<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    // Method for display page create subject
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

        return redirect()->back()->with($notification);                     // Redirect previous page with the success notification
    }
}
