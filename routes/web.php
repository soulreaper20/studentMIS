<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->middleware('role:superAdmin')->name('admin.dashboard');
Route::resource('faculty', 'App\Http\Controllers\Faculty\FacultyController')->middleware('role:superAdmin');

Route::get('/student_dashboard', [App\Http\Controllers\Student\StudentController::class,'index'])->middleware('role:student')->name('student.dashboard');

Route::get('/teacher_dashboard', [App\Http\Controllers\Teacher\TeacherController::class,'index'])->middleware('role:teacher')->name('teacher.dashboard');

Route::resource('student', 'App\Http\Controllers\Student\StudentController');

Route::resource('teacher', 'App\Http\Controllers\Teacher\TeacherController');


