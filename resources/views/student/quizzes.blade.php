@extends('layouts.student')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Quizzes</h3>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
            <div class="col">
                <form class="form-inline my-2 my-lg-0">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search for quiz ..." aria-label="Search">

                </form>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz title</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Start date</th>
                            <th scope="col">Start time</th>
                            <th scope="col">Deadline date</th>
                            <th scope="col">Deadline time</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Duratuion</th>
                            <th scope="col">Option</th>
                            <th scope="col">Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @if($quizzes)
                        @foreach($quizzes as $quiz)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col">{{ $quiz->title }}</td>
                            <td scope="col">{{ $quiz->subject->title }}</td>
                            <td scope="col">{{ $quiz->start_date }}</td>
                            <td scope="col">{{ $quiz->start_time }}</td>
                            <td scope="col">{{ $quiz->deadline_date }}</td>
                            <td scope="col">{{ $quiz->deadline_time }}</td>
                            <td scope="col">{{ $quiz->questions->count() }}</td>
                            <td scope="col">{{ $quiz->duration }} m</td>

                            @if(($quiz->start_date == '0000-00-00') || ($quiz->deadline_date == '0000-00-00'))
                            <td scope="col">Not available yet</td>
                            @elseif(($quiz->start_date >= Carbon::now()->toDateString()) && ($quiz->start_time >= Carbon::now()->toTimeString()))
                            <td scope="col">Not available yet</td>
                            @elseif(($quiz->deadline_date <= Carbon::now()->toDateString()) && ($quiz->deadline_time < Carbon::now()->toTimeString()))
                                    <td scope="col">Expired</td>
                                    @else
                                    @if(hasAttended($quiz->id))
                                    <td scope="col" style="width: 144px">Submitted</td>
                                    @else
                                    <td scope="col" style="width: 144px"><a href="" class="attend" quiz-id="{{ $quiz->id }}">Attend quiz</a></td>
                                    @endif
                                    @endif
                                    <td scope="col"><a href="/student/{{ $quiz->id }}/mark">{{ $quiz->mark }}</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
<meta name="_token" content="{{ csrf_token() }}">
</main> <!-- .cd-main-content -->
<script src="{{ asset('js/attendQuiz.js') }}"></script>
@endsection