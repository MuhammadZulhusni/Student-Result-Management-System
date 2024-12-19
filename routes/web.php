<?php
// Any changes happened just run "php artisan optimize"
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin dashboard route requiring authentication and email verification
// Returns the 'admin.index' view and is named 'dashboard'
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouped routes for 'AdminController.php'
Route::controller(AdminController::class)->group(function(){
    // Route for admin logout
    // URL: 'admin/logout'
    // Calls the 'AdminLogout' method in AdminController
    Route::get('admin/logout', 'AdminLogout')->name('admin.logout');

    // Route to display the admin profile page
    // URL: 'admin/profile'
    // Calls the 'AdminProfile' method in AdminController
    Route::get('admin/profile', 'AdminProfile')->name('admin.profile');

    // Route to handle admin profile update submissions
    // URL: 'admin/profile/update'
    // Calls the 'AdminProfileUpdate' method in AdminController
    Route::post('admin/profile/update', 'AdminProfileUpdate')->name('admin.profile.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
