@extends('layouts.student')

@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3><span>{{ $subject->title }}</span></h3>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <div class="subject-details">
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Subject title</td>
                                <td>{{ $subject->title }}</td>
                            </tr>
                            <tr>
                                <td>Subject id</td>
                                <td>{{ $subject->subject_id }}</td>
                            </tr>
                            <tr>
                                <td>Instructor name</td>
                                <td><a href="">{{ $subject->teacher->first_name." ".$subject->teacher->last_name }}</a></td>
                            </tr>
                            <tr>
                                <td>Subject code <span>&#40;students can join subject only via this code&#41;</span></td>
                                <td>{{ $subject->code }}</td>
                            </tr>
                            <tr>
                                <td>Subject description</td>
                                <td>{{ $subject->description }}</td>
                            </tr>
                            <tr>
                                <td>Number of students</td>
                                <td>students count</td>
                            </tr>
                            <tr>
                                <td>Number of quizzes</td>
                                <td>{{ $subject->quizzes->count() }}</td>
                            </tr>
                            <tr>
                                <td class="last">Created in</td>
                                <td class="last">{{ $subject->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz title</th>
                            <th scope="col">Start date</th>
                            <th scope="col">Start time</th>
                            <th scope="col">deadline date</th>
                            <th scope="col">deadline time</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Option</th>
                            <th scope="col">Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @if($subject->quizzes->count() > 0)
                        @foreach($subject->quizzes as $quiz)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col">{{ $quiz->title }}</td>
                            <td scope="col">{{ $quiz->start_date }}</td>
                            <td scope="col">{{ $quiz->start_time }}</td>
                            <td scope="col">{{ $quiz->deadline_date }}</td>
                            <td scope="col">{{ $quiz->deadline_time }}</td>
                            <td scope="col">{{ $quiz->questions->count() }}</td>
                            <td scope="col">{{ $quiz->duration }} m</td>
                            @if(($quiz->start_date == '00-00-0000') || ($quiz->deadline_date == '00-00-0000'))
                            <td scope="col">Unavailable</td>
                            @elseif($quiz->start_date < Carbon::now()) <td scope="col">Not Available yet</td>
                                @elseif($quiz->deadline_date < Carbon::now()) <td scope="col">Expired</td>
                                    @else
                                    <td scope="col" style="width: 144px"><a class="attend" onclick="return confirm('are you sure you want to attend the quiz ?\nInstructions:\n1.Quiz is multiple choice questions, you have to select one answer for the question to move to the next question.\n2.Try to finish answering all questions before the timer ends.\n3.Do NOT reload the quiz page during quiz.\nWarning: By reloading the quiz page you can NOT return to the quiz again, and you will get marks for the only answered questions.')" href="quiz.php?subject_id= echo $subject_id; ?>&quiz_id= echo $quiz_id; ?>">Attend quiz</a></td>
                                    @endif
                                    <td scope="col"><a href="view-student-answers.php?quiz_id= echo $quiz_id; ?>">{{ $quiz->mark }}</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
@endsection