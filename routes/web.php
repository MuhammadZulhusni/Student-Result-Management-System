<?php
// Any changes happened just run "php artisan optimize"
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ResultController;
use App\Http\Controllers\backend\ClassesController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\SubjectController;

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
    // Route to handle admin password change page
    // URL: 'admin/password/change'
    // Calls the 'AdminPasswordChange' method in AdminController
    Route::get('admin/password/change', 'AdminPasswordChange')->name('admin.password.change');
    // Route to handle admin password update submissions
    // URL: 'admin/password/update'
    // Calls the 'AdminPasswordUpdate' method in AdminController
    Route::post('admin/password/update', 'AdminPasswordUpdate')->name('admin.password.update');
});

// Grouped routes for 'ClassesController.php'
Route::controller(ClassesController::class)->group(function(){
    // Route for create class page
    // URL: 'create/class'
    // Calls the 'CreateClass' method in ClassesController
    Route::get('create/class', 'CreateClass')->name('create.class');
    // Route for storing class data
    // URL: 'store/class'
    // Calls the 'StoreClass' method in ClassesController
    Route::post('store/class', 'StoreClass')->name('store.class');
    // Route for managing classes
    // URL: 'manage/class'
    // Calls the 'ManageClasses' method in ClassesController
    Route::get('manage/classes', 'ManageClasses')->name('manage.classes');
    // Route for editing a class's details
    // URL: 'edit/class/{id}'
    // Calls the 'EditClass' method in the respective controller
    // Put {id} because in view file already pass the ID 
    Route::get('edit/class/{id}', 'EditClass')->name('edit.class');
    // Route for updating class details
    // URL: 'update/class'
    // Calls the 'UpdateClass' method in the respective controller
    Route::post('update/class', 'UpdateClass')->name('update.class');
    // Route for deleting a class
    // URL: 'delete/class/{id}'
    // Calls the 'DeleteClass' method in the ClassesController
    Route::get('delete/class/{id}', 'DeleteClass')->name('delete.class');
});

// Grouped routes for 'SubjectController.php'
Route::controller(SubjectController::class)->group(function(){
    // Route for create subject page
    // URL: 'create/subject'
    // Calls the 'CreateSubject' method in SubjectController
    Route::get('create/subject', 'CreateSubject')->name('create.subject');
    // Route for storing subject data
    // URL: 'store/subject'
    // Calls the 'StoreSubject' method in SubjectController
    Route::post('store/subject', 'StoreSubject')->name('store.subject');
    // Route for managing subjects
    // URL: 'manage/subjects'
    // Calls the 'ManageSubjects' method in SubjectController
    Route::get('manage/subjects', 'ManageSubjects')->name('manage.subjects');
    // Route for editing a subject details
    // URL: 'edit/subject/{id}'
    // Calls the 'EditSubject' method in the respective controller
    // Put {id} because in view file already pass the ID 
    Route::get('edit/subject/{id}', 'EditSubject')->name('edit.subject');
    // Route for updating subject details
    // URL: 'update/subject'
    // Calls the 'UpdateSubject' method in the respective controller
    Route::post('update/subject', 'UpdateSubject')->name('update.subject');
    // Route for deleting a subject
    // URL: 'delete/subject/{id}'
    // Calls the 'DeleteSubject' method in the SubjectController
    Route::get('delete/subject/{id}', 'DeleteSubject')->name('delete.subject');

    // Subject combination all routes
    Route::get('add/subject/combination', 'AddSubjectCombination')->name('add.subject.combination');
    // Route to store subject combination data
    Route::post('store/subject/combination', 'StoreSubjectCombination')->name('store.subject.combination');
    // Create route for manage subject combination
    Route::get('manage/subject/combination', 'ManageSubjectCombination')->name('manage.subject.combination');

    // Deactivate subject combination
    // Put {id} because in view file already pass the ID 
    Route::get('deactivate/subject/combination/{id}', 'DeactivateSubjectCombination')->name('deactivate.subject.combination');
});

// Grouped routes for 'StudentController.php'
Route::controller(StudentController::class)->group(function(){
    // Add students page route
    Route::get('add/student', 'AddStudent')->name('add.student');
    // Store student deatils into database
    Route::post('store/student', 'StoreStudent')->name('store.student');
    // Manage students page
    Route::get('manage/students', 'ManageStudents')->name('manage.students');
    // Route for editing a student's details
    // URL: 'edit/student/{id}'
    // Calls the 'EditStudent' method in the respective controller
    // Put {id} because in view file already pass the ID 
    Route::get('edit/student/{id}', 'EditStudent')->name('edit.student');
    // Implement the update student details
    Route::post('update/student', 'UpdateStudent')->name('update.student');
    // Implement delete student
    Route::get('delete/student/{id}', 'DeleteStudent')->name('delete.student');
});

// Grouped routes for 'ResultController.php'
Route::controller(ResultController::class)->group(function(){
    // Add result page route
    Route::get('add/result', 'AddResult')->name('add.result');
    // AJAX request all routes
    Route::get('fetch/student', 'FetchStudent')->name('fetch.student');
    Route::get('check/student/result', 'FetchStudentResult')->name('check.student.result');
    // Add Result
    Route::post('store/result', 'StoreResult')->name('store.result');
    // Manage result
    Route::get('manage/results', 'ManageResults')->name('manage.results');
    // Edit result
    Route::get('edit/result/{id}', 'EditResult')->name('edit.result');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
