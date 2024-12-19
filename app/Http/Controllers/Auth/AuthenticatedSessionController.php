<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();                                                               // Authenticate the admin using the credentials from the LoginRequest
        $request->session()->regenerate();                                                      // Regenerate the session to protect against session fixation attacks
    
        // Notification message
        $notification = array(
            'message' => 'Admin Login Successfully!',                                           // Success message
            'alert-type' => 'success'                                                           // Alert type for success
        );
    
        // Redirect to the intended route (usually the dashboard) with the success notification
        return redirect()->intended(route('dashboard', absolute: false))->with($notification);  
    }
    
}
