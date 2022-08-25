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
        <div class="col text-right">
            <a href="/{{ $quiz->id }}/export" class="btn bg-secondary text-light">Print Quiz Results</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student name</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @if($quiz->students->count() > 0)
                        @foreach($quiz->students as $student)
                        <tr>
                            <td scope="col">{{ $row_count++ }}</td>
                            <td scope="col">{{ $student->first_name." ".$student->last_name }}</td>
                            @if($quiz->mark / 2 <= $student->pivot['score'])
                                <td scope="col">
                                    <span class="text-success">
                                        {{ $student->pivot['score'] }}
                                    </span> /
                                    {{ $quiz->mark }}
                                </td>
                                @else
                                <td scope="col">
                                    <span class="text-danger">
                                        {{ $student->pivot['score'] }}
                                    </span> /
                                    {{ $quiz->mark }}
                                </td>
                                @endif
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td scope="col">{{ $row_count++ }}</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

@endsection