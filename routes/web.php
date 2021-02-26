<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\BiGGAuthController;
use App\Http\Controllers\BiGG\BiGGController;
use App\Http\Controllers\BiGG\TeachersController;
use App\Http\Controllers\BiGG\StudentsController;
use App\Http\Controllers\BiGG\AngiController;
use App\Http\Controllers\BiGG\HicheelController;
use App\Http\Controllers\BiGG\HuvaariController;
use App\Http\Controllers\BiGG\MergejilController;
use App\Http\Controllers\BiGG\MergejilBagshController;
use App\Http\Controllers\BiGG\TenhimController;

use App\Http\Controllers\Auth\ManagerAuthController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\TeachersController as TeachersControllerDep;
use App\Http\Controllers\Manager\StudentsController as StudentsControllerDep;
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

// Bigg Login
Route::get('bigg', [BiGGAuthController::class, 'biggGet'])->name('biggLogin');
Route::get('bigg/login', [BiGGAuthController::class, 'biggGetLogin'])->name('biggLogin');
Route::post('bigg/login', [BiGGAuthController::class, 'biggLogin'])->name('biggLoginPost');
Route::get('bigg/logout', [BiGGAuthController::class, 'biggLogout'])->name('logout');

Route::group(['prefix' => 'bigg','middleware' => 'biggauth'], function () {
	// Bigg Dashboard
	Route::get('dashboard',[BiGGController::class, 'dashboard'])->name('bigg-dashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersController::class, 'index'])->name('bigg-teachers');
	Route::get('teachers/add',[TeachersController::class, 'add'])->name('bigg-teachers-add');
	Route::get('teachers/edit/{id}',[TeachersController::class, 'edit'])->name('teachers-edit');
	// Route::get('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('teachers-delete');

	Route::post('teachers/add',[TeachersController::class, 'store'])->name('bigg-teachers-save');
	Route::post('teachers/edit/{id}',[TeachersController::class, 'update'])->name('bigg-teachers-edit');
	Route::post('teachers/delete/',[TeachersController::class, 'delete'])->name('bigg-teachers-delete-ajax');

	Route::delete('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('bigg-teachers-delete');

	// Angi
	Route::get('angi',[AngiController::class, 'index'])->name('bigg-angi');
	Route::get('angi/add',[AngiController::class, 'add'])->name('bigg-angi-add');
	Route::get('angi/edit/{id}',[AngiController::class, 'edit'])->name('angi-edit');

	Route::post('angi/add',[AngiController::class, 'store'])->name('bigg-angi-save');
	Route::post('angi/edit/{id}',[AngiController::class, 'update'])->name('bigg-angi-edit');

	Route::delete('angi/delete/{id}',[AngiController::class, 'destroy'])->name('bigg-angi-delete');

	// Mergejil
	Route::get('mergejil',[MergejilController::class, 'index'])->name('bigg-mergejil');
	Route::get('mergejil/add',[MergejilController::class, 'add'])->name('bigg-mergejil-add');
	Route::get('mergejil/edit/{id}',[MergejilController::class, 'edit'])->name('mergejil-edit');

	Route::post('mergejil/add',[MergejilController::class, 'store'])->name('bigg-mergejil-save');
	Route::post('mergejil/edit/{id}',[MergejilController::class, 'update'])->name('bigg-mergejil-edit');
	Route::post('mergejil/delete/',[MergejilController::class, 'delete'])->name('bigg-mergejil-delete-ajax');

	Route::delete('mergejil/delete/{id}',[MergejilController::class, 'destroy'])->name('bigg-mergejil-delete');

	// Mergejil Bagsh
	Route::get('mergejil_bagsh',[MergejilBagshController::class, 'index'])->name('bigg-mergejil_bagsh');
	Route::get('mergejil_bagsh/add',[MergejilBagshController::class, 'add'])->name('bigg-mergejil_bagsh-add');
	Route::get('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'edit'])->name('mergejil_bagsh-edit');

	Route::post('mergejil_bagsh/add',[MergejilBagshController::class, 'store'])->name('bigg-mergejil_bagsh-save');
	Route::post('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'update'])->name('bigg-mergejil_bagsh-edit');

	Route::delete('mergejil_bagsh/delete/{id}',[MergejilBagshController::class, 'destroy'])->name('bigg-mergejil_bagsh-delete');

	// Tenhim
	Route::get('tenhim',[TenhimController::class, 'index'])->name('bigg-tenhim');
	Route::get('tenhim/add',[TenhimController::class, 'add'])->name('bigg-tenhim-add');
	Route::get('tenhim/edit/{id}',[TenhimController::class, 'edit'])->name('tenhim-edit');

	Route::post('tenhim/add',[TenhimController::class, 'store'])->name('bigg-tenhim-save');
	Route::post('tenhim/edit/{id}',[TenhimController::class, 'update'])->name('bigg-tenhim-edit');
	Route::post('tenhim/delete/',[TenhimController::class, 'delete'])->name('bigg-tenhim-delete-ajax');

	Route::delete('tenhim/delete/{id}',[TenhimController::class, 'destroy'])->name('bigg-tenhim-delete');

	// Hicheel
	Route::get('hicheel',[HicheelController::class, 'index'])->name('bigg-hicheel');
	Route::get('hicheel/add',[HicheelController::class, 'add'])->name('bigg-hicheel-add');
	Route::get('hicheel/edit/{id}',[HicheelController::class, 'edit'])->name('hicheel-edit');

	Route::post('hicheel/add',[HicheelController::class, 'store'])->name('bigg-hicheel-save');
	Route::post('hicheel/edit/{id}',[HicheelController::class, 'update'])->name('bigg-hicheel-edit');
	Route::post('hicheel/delete/',[HicheelController::class, 'delete'])->name('bigg-hicheel-delete-ajax');

	Route::delete('hicheel/delete/{id}',[HicheelController::class, 'destroy'])->name('bigg-hicheel-delete');

	// Huvaari
	Route::get('huvaari',[HuvaariController::class, 'index'])->name('bigg-huvaari');

	// Students
	Route::get('students',[StudentsController::class, 'index'])->name('bigg-students');
	Route::get('students/add',[StudentsController::class, 'add'])->name('bigg-students-add');
});

// Manager Login
Route::get('manager', [ManagerAuthController::class, 'managerGet'])->name('managerLogin');
Route::get('manager/login', [ManagerAuthController::class, 'managerGetLogin'])->name('managerLogin');
Route::post('manager/login', [ManagerAuthController::class, 'managerLogin'])->name('managerLoginPost');
Route::get('manager/logout', [ManagerAuthController::class, 'managerLogout'])->name('logout');

Route::group(['prefix' => 'manager','middleware' => 'managerauth'], function () {
	// Manager Dashboard
	Route::get('dashboard',[ManagerController::class, 'dashboard'])->name('dashboard');	

	// Teacher
	Route::get('teachers',[TeachersControllerDep::class, 'index'])->name('teachers');
	Route::get('teachers/add',[TeachersControllerDep::class, 'add'])->name('teachers-add');
	Route::get('teachers/edit/{id}',[TeachersControllerDep::class, 'edit'])->name('teachers-edit');
	// Route::get('teachers/delete/{id}',[TeachersControllerDep::class, 'destroy'])->name('teachers-delete');

	Route::post('teachers/add',[TeachersControllerDep::class, 'store'])->name('teachers-save');
	Route::post('teachers/edit/{id}',[TeachersControllerDep::class, 'update'])->name('teachers-edit');

	Route::delete('teachers/delete/{id}',[TeachersControllerDep::class, 'destroy'])->name('teachers-delete');

	// Students
	Route::get('students',[StudentsControllerDep::class, 'index'])->name('students');
	Route::get('students/add',[StudentsControllerDep::class, 'add'])->name('students-add');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
