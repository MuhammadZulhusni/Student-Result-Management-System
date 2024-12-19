<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Logs out the admin, invalidates the session, and regenerates the CSRF token.
     * Redirects the user to the login page after logging out.
     */
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();                                                    // Logs out the admin
        $request->session()->invalidate();                                                     // Invalidates the current session
        $request->session()->regenerateToken();                                                // Regenerates the CSRF token

        return redirect('/login');                                                         // Redirects to the login page
    }

    /**
     * Displays the admin profile view.
     * Retrieves the currently authenticated admin's data using their ID and passes it to the view.
     */
    public function AdminProfile()
    {
        $id = Auth::user()->id;                                                                 // Get the authenticated user's ID
        $adminData = User::findOrFail($id);                                                 // Retrieve the admin's data from the database

        return view('admin.admin_profile_view', compact('adminData'));    // Return the profile view with admin dat
    }

    /**
     * Updates the admin's profile information.
     * Retrieves the authenticated admin's data, updates their name, email, and photo if provided.
     * Saves the changes and redirects back to the previous page.
     */
    public function AdminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;                                                                   // Get the authenticated admin's ID                           
        $admin = User::findOrFail($id);                                                       // Retrieve the admin's data from the database                 
        $admin->name = $request->name;                                                            // Update the admin's name
        $admin->email = $request->email;                                                          // Update the admin's email

        // Check if a photo file was uploaded
        if($request->hasFile('photo')){
            $file = $request->file('photo');                                                  // Retrieve the uploaded photo
            @unlink(public_path('uploads/admin_profiles/'.$admin->photo));         // Delete the old photo file from the server
            $imageName = date('YmdHi').'.'.$file->getClientOriginalName();                 // Generate a unique filename
            $file->move(public_path('uploads/admin_profiles'), $imageName); // Move the file to the upload directory
            $admin['photo'] = $imageName;                                                          // Update the admin's photo field
        }
        $admin->save();                                                                            // Save the updated admin data

        // Notification message
        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',                                     // Success message
            'alert-type' => 'success'                                                               // Alert type for success
        );

        return redirect()->back()->with($notification);                                        // Redirect back to the previous page with the success notification
    }

    /**
     * Method to display the admin password change page
     * Returns the 'admin_password_change.php' view
     */
    public function AdminPasswordChange()
    {
        return view('admin.admin_password_change');
    }

    /**
     * Method to handle admin password update
     */
    public function AdminPasswordUpdate(Request $request)
    {
        // Validate the input fields for old and new passwords with confirmation
        $request->validate([
            'old_password' => 'required',                                                               // Old password is required
            'new_password' => 'required|confirmed'                                                      // New password is required and must match the confirmation field
        ]);

        // Check if the old password matches the current user's password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            // Notification message
            $notification = array(
                'message' => 'Old Password Does Not Match!',                                            // Not match message
                'alert-type' => 'error'                                                                 // Alert type for error
            );

            return redirect()->back()->with($notification);                                        // Redirect back to the previous page with the error notification
        }

        // Update the admin's password in the database
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)                                     // Hash and save the new password
        ]);

        // Notification message
        $notification = array(
            'message' => 'Password Updated Successfully!',                                              // Success message
            'alert-type' => 'success'                                                                   // Alert type for success
        );

        return redirect()->back()->with($notification);                                            // Redirect back to the previous page with the success notification
    }
}





// PERSONAL NOTE
// 1) 'Request $request' 
// Use 'Request $request' parameter when need to access data sent by the client (e.g.,user inputs, files).
// Don’t use it when you don’t need to interact with incoming request data.

// 2) Laravel Breeze
// In this project, I used laravel breeze for setup authentication (login, registration, password reset, etc.)