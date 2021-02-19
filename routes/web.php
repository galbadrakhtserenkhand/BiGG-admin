<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\StudentsController;

use App\Http\Controllers\Auth\DepartmentAuthController;
use App\Http\Controllers\Department\DepartmentController;
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

// Admin Login
Route::get('admin', [AdminAuthController::class, 'adminGet'])->name('adminLogin');
Route::get('admin/login', [AdminAuthController::class, 'adminGetLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class, 'AdminLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class, 'adminLogout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard',[AdminController::class, 'dashboard'])->name('admindashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersController::class, 'index'])->name('teachers');
	Route::get('teachers/add',[TeachersController::class, 'add'])->name('teachers-add');
	Route::get('teachers/edit/{id}',[TeachersController::class, 'edit'])->name('teachers-edit');
	// Route::get('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('teachers-delete');

	Route::post('teachers/add',[TeachersController::class, 'store'])->name('teachers-save');
	Route::post('teachers/edit/{id}',[TeachersController::class, 'update'])->name('teachers-edit');

	Route::delete('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('teachers-delete');

	// Students
	Route::get('students',[StudentsController::class, 'index'])->name('students');
	Route::get('students/add',[StudentsController::class, 'add'])->name('students-add');
});

// Department Login
Route::get('department', [DepartmentAuthController::class, 'departmentGet'])->name('departmentLogin');
Route::get('department/login', [DepartmentAuthController::class, 'departmentGetLogin'])->name('departmentLogin');
Route::post('department/login', [DepartmentAuthController::class, 'DepartmentLogin'])->name('departmentLoginPost');
Route::get('department/logout', [DepartmentAuthController::class, 'departmentLogout'])->name('logout');

Route::group(['prefix' => 'department','middleware' => 'departmentauth'], function () {
	// Department Dashboard
	Route::get('dashboard',[DepartmentController::class, 'dashboard'])->name('admindashboard');	
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
