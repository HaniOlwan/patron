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
                        <h3>Topic: <span>{{ $question->topic->title }}</span><br>Edit Question</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form action="/question/{{ $question->id }}/edit" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="Question" class="col-sm-2 col-form-label">Question</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="Question" value="{{ $question->title }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Answer-one" class="col-sm-2 col-form-label">Answer one</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control answer" name="answer1" id="Answer-one" value="{{ $question->first_answer }}" required>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="answer1" name="correct_answer" value="1" class="custom-control-input" required {{$question->correct_answer == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="answer1">Correct Answer</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="Answer-two" class="col-sm-2 col-form-label">Answer two</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control answer" name="answer2" id="Answer-two" value="{{ $question->second_answer }}" required>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="answer2" name="correct_answer" value="2" class="custom-control-input" required {{$question->correct_answer == 2 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="answer2">Correct Answer</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Answer-three" class="col-sm-2 col-form-label">Answer three</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control answer" name="answer3" id="Answer-three" value="{{ $question->third_answer }}" required>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="answer3" name="correct_answer" value="3" class="custom-control-input" required {{$question->correct_answer == 3 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="answer3">Correct Answer</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Answer-four" class="col-sm-2 col-form-label">Answer four</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control answer" name="answer4" id="Answer-four" value="{{ $question->forth_answer }}" required>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="answer4" name="correct_answer" value="4" class="custom-control-input" required {{$question->correct_answer == 4 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="answer4">Correct Answer</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Edit Question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
<script>
    $('.answer').blur(function() {
        $answer = $(this).val();
        $(this).parent().find('.custom-control-input').val($answer);
    })
</script>
@endsection