<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
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
                            <h3 class="countdown"></h3><span>({{ session()->get('question_count') }} of {{ $quiz->questions->count() }})</span>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <h5 class="mt-1 ml-2">{{ $question->title }}</h5>
                        </div>
                        <form class="form" action="/student/quiz-page/{{ $quiz->id }}/{{ $question->id }}" method="POST">
                            @csrf
                            <div class="ans ml-2">
                                <label class="radio"> <input id="first_answer" type="radio" name="answer" value="a" {{ $answer ==! null && $answer->answer === 'a' ? 'checked' : '' }}> <span>{{ $question->first_answer }}</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input id="second_answer" type="radio" name="answer" value="b" {{ $answer ==! null && $answer->answer === 'b' ? 'checked' : '' }}> <span>{{ $question->second_answer }}</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input id="third_answer" type="radio" name="answer" value="c" {{ $answer ==! null && $answer->answer === 'c' ? 'checked' : '' }}> <span>{{ $question->third_answer }}</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input id="forth_answer" type="radio" name="answer" value="d" {{ $answer ==! null && $answer->answer === 'd' ? 'checked' : '' }}> <span>{{ $question->forth_answer }}</span>
                                </label>
                            </div>
                    </div>

                    <input name="question_id" class="question_id" type="hidden" value="{{ $question->id }}">
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="previous_btn btn btn-primary d-flex align-items-center btn-danger" type="submit"><i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous</button>
                        <button class="next_btn btn btn-primary border-success align-items-center btn-success" type="submit" name="next" value="next">Next<i class="fa fa-angle-right ml-2"></i></button>
                    </div>
                    <button class="submit btn btn-primary border-success align-items-center btn-success" type="button" name="submit" value="submit">Submit<i class="fa fa-angle-right ml-2"></i></button>

                    </form>
                    <input type="hidden" class="duration" value="{{ $quiz->duration }}">
                    <input type="hidden" class="subject_id" value="{{ $quiz->subject->id }}">
                    <input type="hidden" class="quiz_id" value="{{ $quiz->id }}">
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
</body>

<script>
    const submit = document.querySelector('.submit')
    submit.addEventListener('click', (e) => {
        return submitAnswers();
    })
</script>


<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/menu-aim.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/submitAnswers.js') }}"></script>
<script src="{{ asset('js/quizCountdown.js') }}"></script>



</html>