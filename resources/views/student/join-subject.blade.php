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
                    <button type="button" class="btn btn-secondary">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
                <div class="alert alert-info alert-dismissible fade show display_text" role="alert" id="msg">
                    search for subject title or subject id
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject title</th>
                            <th scope="col">Subject id</th>
                            <th scope="col">Instructor name</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Status</th>
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
                            <td scope="col"><a href="/student/view-subject/{{ $subject->id  }}">{{ $subject->title }}</a></td>
                            <td scope="col">{{ $subject->subject_id }}</td>
                            <td scope="col" style="text-transform: capitalize"><a href="/teacher/{{ $subject->teacher->id }}">{{ $subject->teacher->first_name." ".$subject->teacher->last_name }}</a></td>
                            <td scope="col">{{ $subject->student->count() }}</td>
                            <td scope="col"><i class="{{$subject->private== '1' ? 'fas fa-lock' : 'fas fa-lock-open'}}"></i> {{$subject->private== '1' ? 'Private' : 'Public'}}</td>
                            <td scope="col"><a href="" class="join" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}">Join</a></td>
                        </tr>
                        @endforeach
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

@endsection