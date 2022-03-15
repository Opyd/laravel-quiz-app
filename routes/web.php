<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create somereturn $next($request);thing great!
|
*/

Route::get('/', [\App\Http\Controllers\UserController::class, 'userList'])->middleware('auth')->name('home');
Route::get('/teacher', function (){
    return view('teacherPanel');
})->middleware(\App\Http\Middleware\EnsureTeacher::class);

Auth::routes();

Route::get('/addStudent', function (){
  return view('addStudent');
})->middleware(\App\Http\Middleware\EnsureTeacher::class);

Route::post('/addStudent', [\App\Http\Controllers\UserController::class, 'addStudent'])->middleware(\App\Http\Middleware\EnsureTeacher::class)->name('addStudent');

