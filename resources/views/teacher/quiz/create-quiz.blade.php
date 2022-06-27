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
                        <h3>Subject: <span>{{ $subject->title }}</span><br>Create Quiz</h3>
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
                    <!-- <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> -->

                    <div class="form-group row">
                        <label for="quiz-title" class="col-sm-2 col-form-label">Quiz title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="" class="form-control" id="quiz-title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Select-topics" class="col-sm-2 col-form-label">Select topics </label>
                        <span class="select-topics">&#40;select which topics are included in the quiz and amount of questions from each topic&#41;</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-10">
                            @foreach($topics as $topic)
                            <div class="topic custom-control custom-checkbox">
                                <input type="checkbox" name="selected_topic[]" class="custom-control-input selected_questions" value="{{ $topic->id }}" id="{{ $topic->id }}">
                                <label class="custom-control-label" for="{{ $topic->id }}">{{ $topic->title }}</label>
                                <input type="number" value="0" placeholder="0" class="form-control questions_count " min="0" max="{{ $topic->question->count() }}">
                            </div>
                            @endforeach
                        </div>
                        @if(!$topics)
                        <div class="alert alert-danger" role="alert" style="margin: 0 auto; margin-bottom: 20px ">
                            {{$subject->title}} . ' does not have any topics yet, try to add topics and questions first.'
                            <a href="/topic/{{ $subject->subject_id }}">Add Topic</a>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Start date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" value="" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Start time</label>
                        <div class="col-sm-10">
                            <input type="time" name="start_time" value="" class="form-control" id="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-date" class="col-sm-2 col-form-label">Deadline date</label>
                        <div class="col-sm-10">
                            <input type="date" name="exp_date" value="" class="form-control" id="exp-date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-time" class="col-sm-2 col-form-label">Deadline time</label>
                        <div class="col-sm-10">
                            <input type="time" name="exp_time" value="" class="form-control" id="exp-time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="duration" class="col-sm-2 col-form-label">Select duration <span class="minutes">&#40;minutes&#41;</span></label>
                        <div class="col-sm-10">
                            <input type="number" name="duration" value="" class="form-control" id="duration">

                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Create Quiz</button>
                        </div>
                    </div>
                    <input type="hidden" name="subjectId" value="{{ $topics[0]->subject->subject_id }}">
                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
<meta name="_token" content="{{ csrf_token() }}">

<script>
    const token = document.querySelector('meta[name="_token"]').content;
    const form = document.querySelector('.quiz_form');
    const questionInputs = document.querySelectorAll('.questions_count')
    const selectedQuestions = document.querySelectorAll('.selected_questions')

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // Get question count 
        let count = 0;
        let questions = [];
        for (let index = 0; index < selectedQuestions.length; index++) {
            let id = selectedQuestions[index].value;
            let value = questionInputs[index].value;
            if (selectedQuestions[index].checked) {
                count += Number(questionInputs[index].value);
                questions.push({
                    id,
                    value
                })
            }
        }
        
        questions.push({
            "total": count
        });

        const data = {
            'title': form.title.value,
            'questions_count': questions,
            'start_date': form.start_date.value,
            'start_time': form.start_time.value,
            'exp_date': form.exp_date.value,
            'exp_time': form.exp_time.value,
            'subjectId': form.subjectId.value,
            'duration': form.duration.value,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        })

        $.ajax({
            url: "/subject/" + data.subjectId + "/create-quiz",
            type: "POST",
            data: data,
            success: function(result) {
                console.log(result);
            },
            error: function(result) {
                console.log(result);
            }
        })

    });
</script>
@endsection