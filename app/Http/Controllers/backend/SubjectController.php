<?php

namespace App\Http\Controllers\backend;

use App\Models\Classe;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            $classes = Classe::all();
            $subjects = Subject::all();
            return view('backend.subject.add_subject_combination_view', compact('classes', 'subjects'));
        }

        // Method to store subject combinations for a class
        public function StoreSubjectCombination(Request $request)
        {
            $class = Classe::find($request->class_id);             // Retrieve the specific class using the class_id from the request in view
            $subjects = $request->subject_ids;                          // Retrieve the array of subject IDs from the request
            $class->subjects()->attach($subjects);                      // Attach the subjects to the class (adds records to the pivot table)

            // Notification message
            $notification = array(
                'message' => 'Combination Done Successfully!',          // Success message
                'alert-type' => 'success'                               // Alert type for success
            );

            return redirect()->route('manage.subject.combination')->with($notification);   // Redirect to manage subject combination page with the success notification
        }

        public function ManageSubjectCombination()
        {
            // Query to fetch data from the 'classes_subject' table, with joined data from 'classes' and 'subjects'
            $results = DB::table('classes_subject')
                ->join('classes', 'classes_subject.classes_id', '=', 'classes.id')   // Joining 'classes' table on 'classes_id' column from 'classes_subject' and 'id' column from 'classes'
                ->join('subjects', 'classes_subject.subject_id', '=', 'subjects.id') // Joining 'subjects' table on 'subject_id' column from 'classes_subject' and 'id' column from 'subjects'
                ->select(
                    'classes_subject.*',        // All columns from the 'classes_subject' table
                    'classes.class_name',                // 'class_name' column from the 'classes' table
                    'classes.section',                   // 'section' column from the 'classes' table
                    'subjects.subject_name'              // 'subject_name' column from the 'subjects' table
                )
                ->get(); // Fetching the results as a collection
        
            return view('backend.subject.manage_subject_combination', compact('results'));
        }

        public function DeactivateSubjectCombination($id)
        {
            // Retrieve the current 'status' of the row in the 'classes_subject' table for the given $id
            $status = DB::table('classes_subject')->select('status')->where('id', $id)->first(); // Fetch a single record

            // Check if the current status is 1 (active)
            if($status->status == 1)
                {
                    // Update the 'status' to 0 (deactivated) in the 'classes_subject' table for the given $id
                    DB::table('classes_subject')->where('id', $id)->update(['status' => 0]);

                    // Notification message
                    $notification = array(
                        'message' => 'Subject De-activated Successfully!',                  // De-activated message
                        'alert-type' => 'info'                                              // Info type for success
                    );
            
                    return redirect()->back()->with($notification);                    // Redirect previous page with the success notification
                }
            // Check if the current status is 0 (inactive)
            elseif($status->status == 0)
                {
                    // Update the 'status' to 1 (activated) in the 'classes_subject' table for the given $id
                    DB::table('classes_subject')->where('id', $id)->update(['status' => 1]);

                    // Notification message
                    $notification = array(
                        'message' => 'Subject activated Successfully!',                     // Activated message
                        'alert-type' => 'info'                                              // Info type for success
                    );
            
                    return redirect()->back()->with($notification);                    // Redirect previous page with the success notification
                }
        }       
}
