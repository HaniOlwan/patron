@extends('layouts.teacher')
@section('header')
@if(Auth::user())
<h3>Hi <span>{{Auth::user()->first_name}}</span></h3>
<p>we wish you having a good day.</p>
@endif
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="dash-cards col-lg-4">
            <div class="card dash-card bg-light mb-3">
                <div class="card-header">

                    <div class="head">
                        <h3>Subjects</h3>
                        <a href="/subjects">View more ></a>
                    </div>
                    <i class="dash-icon fas fa-book-open"></i>
                </div>
                <div class="card-body">
                    <p class="card-text">Here you can create subjects for your students, view and manage all your subjects easly.</p>
                    <a href="/create-subject">Create new Subject</a>
                </div>
            </div>
        </div>
        <div class="dash-cards col-lg-4">
            <div class="card dash-card bg-light mb-3">
                <div class="card-header">
                    <div class="head">
                        <h3>Quizzes</h3>
                        <a href="/quizzes">View more ></a>
                    </div>
                    <i class="dash-icon fas fa-question-circle"></i>
                </div>
                <div class="card-body">
                    <p class="card-text">Here you can create unlimited amount of quizzes, and view all your quizzes for all your subjects.</p>
                    <a href="/quizzes">View all quizzes </a>
                </div>
            </div>
        </div>
        <div class="dash-cards col-lg-4">
            <div class="card dash-card bg-light mb-3">
                <div class="card-header">
                    <div class="head">
                        <h3>Quizzes Results</h3>
                        <a href="/results">View more ></a>
                    </div>
                    <i class="dash-icon fas fa-chart-pie"></i>
                </div>
                <div class="card-body">
                    <p class="card-text">Here you will get all the analysis results for all the quizzes you made for all your subjects.</p>
                    <a href="/results">View results</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection