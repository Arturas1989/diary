<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix'=>'students'], function(){
        Route::get('/index', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
        Route::get('/data/{student}', [App\Http\Controllers\StudentController::class, 'data'])->name('students.data');
    });
    Route::group(['prefix'=>'group'], function(){
        Route::get('/index', [App\Http\Controllers\GroupController::class, 'index'])->name('group.index');
        Route::get('/create', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');
        Route::post('/store', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');
        Route::get('/edit/{group}', [App\Http\Controllers\GroupController::class, 'edit'])->name('group.edit');
        Route::post('/update/{group}', [App\Http\Controllers\GroupController::class, 'update'])->name('group.update');
        Route::get('/delete/{group}', [App\Http\Controllers\GroupController::class, 'destroy'])->name('group.delete');
    });
    
    
        Route::get('student/delete/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.delete');
    
    Route::group(['prefix'=>'lesson'], function(){
        Route::get('/index', [App\Http\Controllers\LessonController::class, 'index'])->name('lesson.index');
        Route::get('/create', [App\Http\Controllers\LessonController::class, 'create'])->name('lesson.create');
        Route::post('/store/', [App\Http\Controllers\LessonController::class, 'store'])->name('lesson.store');
        Route::get('/edit/{lesson}', [App\Http\Controllers\LessonController::class, 'edit'])->name('lesson.edit');
        Route::post('/update/{lesson}', [App\Http\Controllers\LessonController::class, 'update'])->name('lesson.update');
        Route::post('/delete/{lesson}', [App\Http\Controllers\LessonController::class, 'destroy'])->name('lesson.delete');
    });
    Route::group(['prefix'=>'grade'], function(){
        Route::get('/index', [App\Http\Controllers\GradeController::class, 'index'])->name('grade.index');
        Route::get('/create', [App\Http\Controllers\GradeController::class, 'create'])->name('grade.create');
        Route::post('/store/', [App\Http\Controllers\GradeController::class, 'store'])->name('grade.store');
        Route::get('/edit/{grades}', [App\Http\Controllers\GradeController::class, 'edit'])->name('grade.edit');
        Route::post('/update/{grades}', [App\Http\Controllers\GradeController::class, 'update'])->name('grade.update');
        Route::post('/delete/{grades}', [App\Http\Controllers\GradeController::class, 'destroy'])->name('grade.delete');
    });
});