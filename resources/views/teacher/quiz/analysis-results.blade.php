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
                        <h3>Analysis Results: {{$quiz->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student name</th>
                            <th scope="col">Mark</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @foreach($quiz->students as $student)
                        <tr>
                            <td scope="col">{{ $row_count++ }}</td>
                            <td scope="col">{{ $student->first_name." ".$student->last_name }}</td>
                            <td scope="col">{{ $quiz->mark }}</td>
                            @if($quiz->mark / 2 <= quizScore($student->id, $quiz->id ))
                            <td class="text-success" scope="col">{{quizScore($student->id, $quiz->id )}}</td>
                            @else
                            <td class="text-danger" scope="col">{{quizScore($student->id, $quiz->id )}}</td>
                            @endif
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