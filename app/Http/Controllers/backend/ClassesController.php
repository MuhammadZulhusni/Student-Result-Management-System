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

        return redirect()->route('manage.classes')->with($notification);   // Redirect to manage.class page with the success notification
    }

    public function ManageClasses(Request $request)
    {
        $classes = classes::all();                                                                  // Retrieve all class records from the database
        return view('backend.class.manage_classes_view', compact('classes')); // Pass the class data to the view | 'classes' is the variable name.
    }

    public function EditClass($id)
    {
        $class = classes::find($id);                                                        // Retrieve the class with the specified ID
        // echo $class;
        return view('backend.class.edit_class_view', compact('class'));   // Return the edit view with class data
    }

    // Controller method to handle updating a class
    // Updates the class record with the given ID using the submitted form data
    public function UpdateClass(Request $request)
    {
        $id = $request->id;
        classes::find($id)->update([          // Find the class by ID and update its details
            'class_name' => $request->class_name, // Update the class name
            'section' => $request->section        // Update the section
        ]);

        // Notification message
        $notification = array(
            'message' => 'Student Class Updated Successfully!',                // Success message
            'alert-type' => 'success'                                          // Alert type for success
        );

        return redirect()->route('manage.classes')->with($notification);   // Redirect to manage.class page with the success notification
    }
}
