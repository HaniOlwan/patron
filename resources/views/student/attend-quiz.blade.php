<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Title</title>
    <link rel="stylesheet" href="{{ asset('css/quiz-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>{{ $quiz->title }}</h4>
                            <h3 class="countdown"></h3>
                            <span><span class="question_count"></span></span>
                        </div>
                    </div>
                    <div class="all_questions">
                        @php
                        $count = 1;
                        @endphp
                        @foreach($questions as $question)
                        <div class="question bg-white p-3 border-bottom" count="{{ $count++ }}">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h3 class="text-danger">Q.</h3>
                                <h5 class="mt-1 ml-2">{{ $question->title }}</h5>
                            </div>
                            <form class="form" action="/student/{{ $quiz->id }}/submit-quiz" method="POST">
                                @csrf
                                <div class="ans ml-2">
                                    <label class="radio"> <input id="first_answer" type="radio" name="questions[{{ $question->id }}]" value="a"> <span>{{ $question->first_answer }}</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input id="second_answer" type="radio" name="questions[{{ $question->id }}]" value="b"> <span>{{ $question->second_answer }}</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input id="third_answer" type="radio" name="questions[{{ $question->id }}]" value="c"> <span>{{ $question->third_answer }}</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input id="forth_answer" type="radio" name="questions[{{ $question->id }}]" value="d"> <span>{{ $question->forth_answer }}</span>
                                    </label>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" class="duration" value="{{ $quiz->duration }}">
                    <input type="hidden" class="quiz_id" value="{{ $quiz->id }}">
                    <input type="hidden" class="subject_id" value="{{ $quiz->subject->id }}">
                    <div class="d-flex flex-row justify-content-end align-items-center p-3 bg-white">
                        <button class="submit btn border-secondary align-items-center btn-secondary mb-2" type="submit" name="submit" value="submit">Submit<i class="fa fa-angle-right ml-2"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
</body>


<script src="{{ asset('js/submitAnswers.js') }}"></script>
<script src="{{ asset('js/quizCountdown.js') }}"></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/menu-aim.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="{{ asset('js/script.js') }}"></script>

<script>
    const token = document.querySelector('meta[name="_token"]').content;

    localStorage.setItem('quiz', document.querySelector('.quiz_id').value);
    localStorage.setItem('subject', document.querySelector('.subject_id').value);
    $('input[type=radio]').change(function() {
        questions = {};
        $('input:radio').each(function() {
            if ($(this).is(':checked')) {
                let key = this.name.split('[')[1].split(']')[0];
                questions[key] = this.value;
            }
        });
        localStorage.setItem('questions', JSON.stringify(questions))
    });
</script>

</html>