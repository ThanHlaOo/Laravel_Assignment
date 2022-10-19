<?php

use App\Http\Controllers\Major\MajorController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::post('/task', [TaskController::class, 'create'] );

//Route::get('/',[TaskController::class, 'index'] );
//Route::delete('/task/{task}', [TaskController::class, 'delete']);

//Student Routes
Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/students', [StudentController::class, 'showList'])->name('student.list');
Route::get('/students/add', [StudentController::class, 'create'])->name('student.add-form');
Route::post('/students/create', [StudentController::class, 'addStudent'])->name('add-form');
Route::get('/students/search', [StudentController::class, 'searchStudent'])->name('search');
Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('edit');
Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('update-form');
Route::delete('/students/delete/{student}', [StudentController::class, 'delete'])->name('delete');

//Major Routes
Route::get('/majors', [MajorController::class, 'index'])->name('major.list');
Route::get('/majors/add', [MajorController::class, 'create']);
Route::post('/majors/add', [MajorController::class, 'addMajor'])->name('major.add-form');
Route::get('/majors/edit/{id}', [MajorController::class, 'edit']);
Route::post('/majors/update/{id}', [MajorController::class, 'update'])->name('major.update');
Route::delete('/majors/delete/{major}', [MajorController::class, 'delete']);

//Export 

Route::get('/students/export', [StudentController::class, 'export'])->name('export');

//Import
Route::post('/students/import', [StudentController::class, 'import'])->name('import');