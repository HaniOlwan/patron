@extends('layouts.teacher')
@section('title','View Quiz')
@section('content')
<div class="cd-content-wrapper">
    <!-- main content here -->
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>{{ $quiz->title }}</h3>
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
                                <td>Quiz title</td>
                                <td style="text-transform: capitalize">{{ $quiz->title }}</td>
                            </tr>

                            <tr>
                                <td>Instructor name</td>
                                <td style="text-transform: capitalize">{{ $quiz->user->first_name." ".$quiz->user->last_name }}</td>
                            </tr>

                            <tr>
                                <td>topics of quiz</td>
                                <td>
                                    @if(count($quiz->topics) ==! 0)
                                    @foreach($quiz->topics as $topic)
                                    <a style="text-transform: capitalize" href="/view-topic/{{ $topic->id }}">{{$topic->title}} {{$topic['pivot']['topic_questions']}}</a><br>
                                    @endforeach
                                    @else
                                    <a style="text-transform: capitalize" href="">0</a><br>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Start date</td>
                                <td>{{ $quiz->start_date }}</td>
                            </tr>
                            <tr>
                                <td>Start time</td>
                                <td>{{ $quiz->start_time }}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>{{ $quiz->duration }}</td>
                            </tr>
                            <tr>
                                <td>Deadline date</td>
                                <td>{{ $quiz->deadline_date }}</td>
                            </tr>
                            <tr>
                                <td>Deadline time</td>
                                <td>{{ $quiz->deadline_time }}</td>
                            </tr>

                            <tr>
                                <td class="last"># Participants</td>
                                <td class="last">&#40; echo $quiz_students_count; ?>&#41; of echo $students_count; ?> students</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="add row">
            <div class="col text-right">
                <a href="edit-quiz.php?quiz_id= echo $quiz_id; ?>&subject_id= echo $subject_id; ?>">Edit Quiz</a>
                <a onclick="return confirm('Are you sure deleting quiz  echo $quiz_title; ?> ? \nBy deleting the quiz everything related to this quiz will be deleted such as students answers and analysis, and you will not be able to recover this data anymore!')" href="view-quizzes.php?delete_quiz= echo $quiz_id; ?>">Delete Quiz</a>
                <a href="quiz-sample.php?subject_id= echo $subject_id; ?>&quiz_id= echo $quiz_id; ?>" target="_blank">View Quiz Sample</a>
                <a href="">View Analysis Result</a>
            </div>
        </div>

        <div class="row" id="students">
            <div class="col">
                <h3>Participant Students</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Mark <span>from &#40; echo $mark; ?>&#41;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"> echo $student_number; ?></td>
                            <td scope="col" style="text-transform: capitalize"><a href="teacher-profile.php?id= echo $student_id; ?>"> echo $student_fname; ?> echo $student_lname; ?></a></td>
                            <td scope="col"> echo $student_email; ?></td>
                            <td scope="col"> echo $student_phone; ?></td>
                            <td scope="col"><a target="_blank" href="view-student-answers.php?quiz_id= echo $quiz_id; ?>&student_id= echo $student_id; ?>"> echo $student_mark; ?></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
@endsection