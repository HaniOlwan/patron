<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectContoller;
use App\Http\Controllers\TopicController;
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


Route::get('/dashboard',  function () {
    return view('teacher.dashboard');
});

Route::group(['middleware' => ['teacher']], function () {
    // all teacher routes goes here

    Route::get('/subjects', [SubjectContoller::class, 'index']);
    Route::get('/create-subject', [SubjectContoller::class, 'viewCreateSubject']);
    Route::post('/create-subject', [SubjectContoller::class, 'createSubject']);
    Route::delete('/subject/{id}', [SubjectContoller::class, 'destory']);

    Route::get('/subject/{id}', [SubjectContoller::class, 'viewSubject']);
    Route::get('/edit-subject/{id}', [SubjectContoller::class, 'viewEditSubject']);
    Route::patch('/edit-subject/{id}', [SubjectContoller::class, 'update']);

    Route::get('/question-bank/{subject:subject_id}', [SubjectContoller::class, 'questionBank']);



    Route::get('/quizzes', [QuizController::class, 'index']);
    Route::get('/subject/{subject:subject_id}/create-quiz', [QuizController::class, 'viewCreatePage']);
    Route::post('/subject/{subject:subject_id}/create-quiz', [QuizController::class, 'create']);


    Route::get('/topic/{subject:subject_id}', [TopicController::class, 'index']);
    Route::post('/topic/{subject:subject_id}', [TopicController::class, 'create']);


});
