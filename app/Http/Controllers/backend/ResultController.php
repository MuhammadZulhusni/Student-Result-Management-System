<?php

namespace App\Http\Controllers\backend;

use App\Models\Result;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function AddResult()
    {
        $classes = Classe::all();
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
        $class = Classe::with('subjects')->where('id',  $class_id)->first();
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

    public function FetchStudentResult(Request $request)
    {
        $student_id = $request->student_id;        // Retrieves the student ID from the request data
        $result = Result::where('student_id', $student_id)->first();  // Queries the database to find the result associated with the student ID
        $message = '';                             // Initializes a message variable to store the response message

        // Checks if a result exists for the student
        if($result){
            // If the result exists, sets an alert message indicating the result is already declared
            $message .= ' <div class="alert alert-primary alert-dismissible fade show shadow-sm" role="alert">
                            <i class="ri-information-line me-2"></i>
                                This student\'s result is already declared!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
        }

        // Returns the message as a JSON response
        return response()->json($message);
    }

    public function StoreResult(Request $request)
    {
        // dd($request->all());
        $sub_count = count($request->subject_ids);
        for ($i=0; $i < $sub_count; $i++) { 
            $result = [
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_ids[$i],
                'marks' => $request->marks[$i] 
            ];

            Result::create($result);
        }

        // Notification message
        $notification = array(
            'message' => 'Result Declared Successfully!',                
            'alert-type' => 'success'                                          
        );

        return redirect()->route('manage.results')->with($notification);   
    }

    public function ManageResults(Request $request)
    {
        // Eager load student relationship
        $results = Result::with('student')->get();
    
        // Auto-delete any result with missing student
        $results = $results->filter(function ($result) {
            if (is_null($result->student)) {
                $result->delete();
                return false;
            }
            return true;
        });
    
        // Group by student_id after cleanup
        $groupedResults = $results->groupBy('student_id')->map(function ($group) {
            return $group->first(); // keep only one record per student for display
        });
    
        return view('backend.result.manage_result', [
            'results' => $groupedResults
        ]);
    }
    

    public function EditResult($id)
    {
        $result = Result::where('student_id',$id)->get();             // Retrieve all results associated with the given student ID                                            
        return view('backend.result.edit_result', compact('result'));  // Return the 'edit_result' view, passing the $result data to the view
    }

    public function UpdateResult(Request $request)
    {
        // dd($request->all());
         // Get the count of subject IDs from the request to determine how many updates to perform
        $sub_count = count($request->subject_ids);

         // Loop through each subject to update its corresponding result record
        for ($i=0; $i < $sub_count; $i++) { 
            // Find the result record by its ID and update the subject ID and marks
            $result = Result::where('id', $request->result_ids[$i])->update([
                'subject_id' => $request->subject_ids[$i], // Update subject ID
                'marks' => $request->marks[$i],            // Update marks
            ]);
        }

        // Notification message
        $notification = array(
            'message' => 'Result Updated Successfully!',                
            'alert-type' => 'success'                                          
        );

        return redirect()->back()->with($notification);   
    }

    public function DeleteResult($id)
    {
        $result = Result::where('student_id', $id)->get();  // Retrieve all results for the specified student ID                             

        // Loop through each result and delete it
        for ($i=0; $i < count($result); $i++) { 
        $result[$i]->delete();
        }

        // Notification message
        $notification = array(
            'message' => 'Result Deleted Successfully!',                
            'alert-type' => 'success'                                          
        );

        return redirect()->back()->with($notification);   
    }

}
