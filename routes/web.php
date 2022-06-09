<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectContoller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/signup', [RegisterController::class, 'signup']);
Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/signin', [SessionController::class, 'login']);
Route::post('/signin', [SessionController::class, 'authenticate']);

Route::get('/logout', [SessionController::class, 'logout']);

Route::group(['middleware' => ['student']], function () {
    // all students routes goes here
    Route::get('/student',  function () {
        return view('student');
    });
});



Route::group(['middleware' => ['teacher']], function () {
    // all teacher routes goes here
    Route::get('/teacher',  function () {
        return view('teacher.dashboard');
    });

    Route::get('/teacher/subjects', [SubjectContoller::class, 'index']);
    Route::get('/teacher/create-subject', [SubjectContoller::class, 'viewCreateSubject']);
    Route::post('/teacher/create-subject', [SubjectContoller::class, 'createSubject']);
});
