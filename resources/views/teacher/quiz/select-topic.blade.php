@extends('layouts.teacher')
@section('content')
<div class="cd-content-wrapper">
    <!-- main content here -->
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3><span>{{ $quiz->title }}</span><br>Select Topics</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form class="topic_form">
                    @csrf
                    <div class="row">
                        @if(count($quiz->subject->topics) !== 0)
                        @foreach($quiz->subject->topics as $topic)
                        <div class="col-lg-4 col-sm-10">
                            <div class="topic custom-control custom-checkbox">
                                <input type="checkbox" name="selected_topic[]" class="custom-control-input selected_questions" value="{{ $topic->id }}" id="{{ $topic->id }}">
                                <label class="custom-control-label" for="{{ $topic->id }}">{{ $topic->title }}</label>
                                <input type="number" value="{{ $topic->pivot or 0 }}" placeholder="0" class="form-control questions_count" min="0" max="{{ $topic->question->count() }}">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-danger" role="alert" style="margin: 0 auto; margin-bottom: 20px ">
                            {{$quiz->subject->title}} . ' does not have any topics yet, try to add topics and questions first.'
                            <a href="/topic/{{ $quiz->subject->id }}">Add Topic</a>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Select Topics</button>
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
<script src="{{ asset('js/quiz-select-topics.js') }}"></script>

@endsection