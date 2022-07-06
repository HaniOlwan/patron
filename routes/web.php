<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectContoller;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserContoller;
use App\Models\SubjectStudent;
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


Route::get('/signup', [RegisterController::class, 'signup']);
Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/signin', [SessionController::class, 'login']);
Route::post('/signin', [SessionController::class, 'authenticate']);

Route::get('/logout', [SessionController::class, 'logout']);



Route::get('/',  function () {
    $userStatus = Auth::user()->rule;
    if ($userStatus == 'teacher') {
        return view('teacher.dashboard');
    } else {
        return view('student.dashboard');
    }
});


Route::group(['prefix' => '/student', 'middleware' => ['student']], function () {
    // all students routes goes here
    Route::get(
        '/',
        function () {
            return view('student.dashboard');
        }
    );

    Route::get('/subjects',  function () {
        return view('student.subjects');
    });

    Route::get('/subjects', [SubjectContoller::class, 'viewSubjectsPage']);
    Route::get('/join-subject', [SubjectContoller::class, 'viewJoinSubject']);
    Route::get('/join-subject', [SubjectContoller::class, 'search'])->name('search');
    Route::get('/view-subject/{subject}', [SubjectContoller::class, 'viewSubjectStudent']);

    Route::post('/join-subject/{subject}', [SubjectContoller::class, 'registerSubject']);
    Route::get('/drop-subject/{subject}', [SubjectContoller::class, 'dropSubject']);

});


Route::group(['middleware' => ['teacher']], function () {
    // all teacher routes goes here
    Route::get('/subjects', [SubjectContoller::class, 'index']);
    Route::get('/create-subject', [SubjectContoller::class, 'createPage']);
    Route::get('/question-bank/{subject}', [SubjectContoller::class, 'questionBank']);
    Route::get('/subject/{subject}', [SubjectContoller::class, 'viewSubject']);
    Route::get('/edit-subject/{subject}', [SubjectContoller::class, 'updatePage']);
    Route::post('/create-subject', [SubjectContoller::class, 'create']);
    Route::delete('/subject/{subject}', [SubjectContoller::class, 'destory']);
    Route::patch('/edit-subject/{subject}', [SubjectContoller::class, 'update']);


    Route::get('/quizzes', [QuizController::class, 'index']);
    Route::get('/quiz/{subject}/create-quiz', [QuizController::class, 'createPage']);
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
    Route::get('/change-password', [UserContoller::class, 'viewPassword']);
    Route::post('/change-password', [UserContoller::class, 'updatePassword']);
    Route::delete('/delete-account', [UserContoller::class, 'destroy']);
});
