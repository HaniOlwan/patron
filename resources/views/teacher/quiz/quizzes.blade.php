@extends('layouts.teacher')
@section('content')

<div class="cd-content-wrapper">
    <!-- main content here -->
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout" dashboard.php>
                        <h3>Quizzes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
            <!--             
            <div class="col">
                <form class="form-inline my-2 my-lg-0">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search for quiz ..." aria-label="Search">

                </form>
            </div> -->

        </div>
        <div class="row">
            <div class="col">
                <!-- Messages -->
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz title</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Deadline Date</th>
                            <th scope="col">Deadline Time</th>
                            <th scope="col">Duratuion</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Sample</th>
                            <th scope="col">Analysis result</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @foreach($quizzes as $quiz)
                        <tr>
                            <td scope="col">{{ $row_count++ }}</td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}">{{ $quiz->title }}</a></td>
                            <td scope="col"><a href="view-subject.php?subject_id= echo $subject_id; ?>">{{ $quiz->subject->title }}</a></td>
                            <td scope="col">{{ $quiz->deadline_date }}</td>
                            <td scope="col">{{ $quiz->deadline_time }}</td>
                            <td scope="col">{{ $quiz->duration }}</td>
                            <td scope="col"><a href="quiz-details.php?quiz_id= echo $quiz_id; ?>&subject_id= echo $subject_id; ?>#students"> </a></td>
                            <td scope="col"><a href="quiz-sample.php?subject_id= echo $subject_id; ?>&quiz_id= echo $quiz_id; ?>" target="_blank"><i class="far fa-file-alt"></i></a></td>
                            <td scope="col"><a href="analysis-result.html"><i class="fas fa-chart-pie"></i></a></td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}/edit-quiz"><i class="fas fa-pencil-alt"></i></a></td>
                            <td scope="col"><a onclick="return confirm('Are you sure deleting quiz  echo $quiz_title; ?> ? \nBy deleting the quiz everything related to this quiz will be deleted such as students answers and analysis, and you will not be able to recover this data anymore!')" href="view-quizzes.php?delete_quiz= echo $quiz_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

@endsection