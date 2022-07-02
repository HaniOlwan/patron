<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectContoller;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserContoller;
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

    Route::get('/subject/{subject}', [SubjectContoller::class, 'viewSubject']);
    Route::get('/edit-subject/{id}', [SubjectContoller::class, 'viewEditSubject']);
    Route::patch('/edit-subject/{id}', [SubjectContoller::class, 'update']);

    Route::get('/question-bank/{subject}', [SubjectContoller::class, 'questionBank']);



    Route::get('/quizzes', [QuizController::class, 'index']);
    Route::get('/quiz/{subject}/create-quiz', [QuizController::class, 'viewCreatePage']);
    Route::post('/quiz/{subject}/create-quiz', [QuizController::class, 'create']);
    Route::get('/quiz/{quiz}', [QuizController::class, 'viewQuiz']);
    Route::get('/quiz/{quiz}/edit-quiz', [QuizController::class, 'viewEditQuiz']);
    Route::patch('/quiz/{quiz}/edit-quiz', [QuizController::class, 'update']);

    Route::get('/quiz/{quiz}/select-topic', [QuizController::class, 'viewSelectPage']);
    Route::post('/quiz/{quiz}/select-topic', [QuizController::class, 'selectTopic']);



    Route::delete('/quiz/{quiz}', [QuizController::class, 'destroy']);


    Route::get('/topic/{subject}', [TopicController::class, 'index']);
    Route::post('/topic/{subject}', [TopicController::class, 'create']);
    Route::get('/topic/{topic:id}/edit', [TopicController::class, 'viewEditTopic']);
    Route::patch('/topic/{topic:id}/edit', [TopicController::class, 'update']);
    Route::get('/view-topic/{topic}', [TopicController::class, 'viewTopic']);
    Route::delete('/topic/{topic}', [TopicController::class, 'destroy']);


    Route::get('/{topic}/create-question', [QuestionController::class, 'index']);
    Route::post('/{topic}/create-question', [QuestionController::class, 'create']);
    Route::get('/question/{question:id}/edit', [QuestionController::class, 'viewEditQuestion']);
    Route::patch('/question/{question:id}/edit', [QuestionController::class, 'update']);
    Route::delete('/question/{question:id}', [QuestionController::class, 'destroy']);


    Route::get('/profile', [UserContoller::class, 'profile']);
    Route::get('/edit-profile', [UserContoller::class, 'viewEditProfile']);
    Route::patch('/edit-profile', [UserContoller::class, 'update']);



});
