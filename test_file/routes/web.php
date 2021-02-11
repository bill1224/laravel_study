<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\TaskController;

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

Route :: get ( 'posts', function () 
{ 
    return 'all posts'; 
});

Auth::routes();

// Route::resource('qna', QnaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/tasks', [TaskController::class, 'index']);

// Route::get('/tasks/{task}', [TaskController::class, 'show']);

// Route::post('/tasks', [TaskController::class, 'store']);

// Route::get('/tasks/create',[TaskController::class, 'create'])->name(create');

Route::resource('tasks', TaskController::class);