@extends('layouts.teacher')
@section('content')

<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Quiz: <span>{{ $quiz->title }}</span><br>Edit Quiz</h3>

                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form class="quiz_form">
                    @csrf
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="quiz-title" class="col-sm-2 col-form-label">Quiz title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ $quiz->title }}" class="form-control" id="quiz-title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Select-topics" class="col-sm-2 col-form-label">Select topics </label>
                        <span class="select-topics">&#40;select which topics are included in the quiz and amount of questions from each topic&#41;</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-10">
                            @if(count($topics) !== 0)
                            @foreach($topics as $topic)
                            <div class="topic custom-control custom-checkbox">
                                <input type="checkbox" name="selected_topic[]" class="custom-control-input selected_questions" value="{{ $topic->id }}" id="{{ $topic->id }}" {{ ($topic->id) ? 'checked' : ''}}>
                                <label class="custom-control-label" for="{{ $topic->id }}">{{ $topic->title }}</label>
                                <input type="number" value="{{ $topic->pivot['topic_questions']}}" placeholder="0" class="form-control questions_count " min="0" max="{{ $topic->question->count() }}">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        @if(count($topics) == 0)
                        <div class="alert alert-danger" role="alert" style="margin: 0 auto; margin-bottom: 20px ">
                            {{$subject->title}} . ' does not have any topics yet, try to add topics and questions first.'
                            <a href="/quiz/{{ $quiz->id }}/select-topic">Select Topic</a>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Start date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" value="{{ $quiz->start_date }}" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Start time</label>
                        <div class="col-sm-10">
                            <input type="time" name="start_time" value="{{ $quiz->start_time }}" class="form-control" id="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-date" class="col-sm-2 col-form-label">Deadline date</label>
                        <div class="col-sm-10">
                            <input type="date" name="exp_date" value="{{ $quiz->deadline_date }}" class="form-control" id="exp-date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-time" class="col-sm-2 col-form-label">Deadline time</label>
                        <div class="col-sm-10">
                            <input type="time" name="exp_time" value="{{ $quiz->deadline_time }}" class="form-control" id="exp-time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="duration" class="col-sm-2 col-form-label">Select duration <span class="minutes">&#40;minutes&#41;</span></label>
                        <div class="col-sm-10">
                            <input type="number" name="duration" value="{{ $quiz->duration }}" class="form-control" id="duration">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Edit Quiz</button>
                        </div>
                    </div>
                    <input type="hidden" name="quizId" value="{{ $quiz->id }}">
                </form>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/editQuiz.js') }}"></script>
@endsection