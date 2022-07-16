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
                            <span>(<span class="question_count"></span> of {{ $questions->count() }})</span>
                        </div>
                    </div>
                    @foreach($questions as $question)
                    <div class="question bg-white p-3 border-bottom">
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
                                <label class="radio"> <input id="second_answer" type="radio" name="questions[{{ $question->id }}]"  value="b"> <span>{{ $question->second_answer }}</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input id="third_answer" type="radio" name="questions[{{ $question->id }}]"  value="c"> <span>{{ $question->third_answer }}</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input id="forth_answer" type="radio" name="questions[{{ $question->id }}]"  value="d"> <span>{{ $question->forth_answer }}</span>
                                </label>
                            </div>
                    </div>
                    @endforeach
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="previous_btn btn btn-primary d-flex align-items-center btn-danger" type="submit" onclick="return dicrement()"><i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous</button>
                        <button class="next_btn btn btn-primary border-success align-items-center btn-success" type="button" name="next" value="next" onclick="return increment()">Next<i class="fa fa-angle-right ml-2"></i></button>
                        <button class="submit btn btn-primary border-secondary align-items-center btn-secondary" type="submit" name="submit" value="submit">Submit<i class="fa fa-angle-right ml-2"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
</body>

<script>
    window.onload = () => {
        questionCount.textContent = window.localStorage.getItem('question_count');
    }
    const questionCount = document.querySelector('.question_count');
    const next = document.querySelector('.next_btn');
    const previous = document.querySelector('.previous_btn');

    const increment = () => {
        window.localStorage.setItem('question_count', Number(window.localStorage.getItem('question_count')) + 1);
    }

    const dicrement = () => {
        window.localStorage.setItem('question_count', Number(window.localStorage.getItem('question_count')) - 1);
    }
  
</script>
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

</html>