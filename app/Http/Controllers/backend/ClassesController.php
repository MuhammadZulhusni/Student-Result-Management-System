<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;

class ClassesController extends Controller
{
    public function CreateClass()
    {
        return view('backend.class.create_class_view');                  // Displays the 'create_class_view' page for adding a new class
    }

    public function StoreClass(Request $request)
    {
        $class = New classes();                                                // Create a new instance of the Classes model
        $class->class_name = $request->class_name;                             // Assign the class name from the request
        $class->section = $request->section;                                   // Assign the section from the request
        $class->save();                                                        // Save the new class record to the database

        // Notification message
        $notification = array(
            'message' => 'Student Class Created Successfully!',                // Success message
            'alert-type' => 'success'                                          // Alert type for success
        );

        return redirect()->back()->with($notification);                   // Redirect back to the previous page with the success notification
    }
}
