@extends('layouts.student')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Search for Subjects</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
            <div class="col">
                <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search for subject name or id" aria-label="Search" id="search" value="{{ old('query') }}">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-dismissible fade show display_text" role="alert" id="msg">
                    Search for subject title or subject id
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject title</th>
                            <th scope="col">Subject id</th>
                            <th scope="col">Instructors</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count = 1;
                        @endphp
                        @if($subjects)
                        @foreach($subjects as $subject)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            @if(studentJoinedSubject(Auth::user()->id, $subject->id))
                            <td scope="col"><a href="/student/subject/{{ $subject->id }}">{{ $subject->title }}</a></td>
                            @elseif($subject->private !== 1)
                            <td scope="col"><a href="/student/subject/{{ $subject->id }}">{{ $subject->title }}</a></td>
                            @endif
                            <td scope="col">{{ $subject->subject_id }}</td>
                            <td scope="col" style="text-transform: capitalize"><a href="/student/{{ $subject->id }}/teachers">{{ $subject->teachers->count() }}</a></td>
                            <td scope="col">{{ $subject->students->count() }}</td>
                            @if($subject->teachers->count() > 0)
                            @if(studentJoinedSubject(Auth::user()->id, $subject->id))
                            <td scope="col"><a href="" class="drop" role="student" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}">Drop</a></td>
                            @else
                            <td scope="col"><a href="" class="join" role="student" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}">Join</a></td>
                            @endif
                            @else
                            <td scope="col">Not available
                                <span class="text-xs">&#40;There's no assigned </br> Instructors to this subject&#41;</span>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col"><a href="">-</a></td>
                            <td scope="col">-</td>
                            <td scope="col" style="text-transform: capitalize"><a href="">-</a></td>
                            <td scope="col">-</td>
                            <td scope="col"><a href="" class="join">Join</a></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

<script src="{{ asset('js/joinSubject.js') }}"></script>
<script src="{{ asset('js/dropSubject.js') }}"></script>


@endsection