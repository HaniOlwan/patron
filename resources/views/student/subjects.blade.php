@extends('layouts.student')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Subjects</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
            <div class="col">
                <form class="form-inline my-2 my-lg-0">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="Search for subject ..." aria-label="Search">
                </form>
            </div>
            <div class="row">
                <a href="/student/join-subject">Join new subject</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('error')}}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('success')}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject title</th>
                            <th scope="col">Subject id</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $subjects = Auth::user()->joinedSubjects;
                        $row_count = 1;
                        @endphp
                        @if($subjects->count() > 0)
                        @foreach($subjects as $subject)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col"><a href="/student/subject/{{ $subject->id }}">{{ $subject->title }}</a></td>
                            <td scope="col">{{ $subject->subject_id }}</td>
                            <td scope="col" style="text-transform: capitalize"><a href="/student/{{$subject->id}}/teachers">{{ $subject->teachers->count() }}</a></td>
                            @if(studentJoinedSubject(Auth::user()->id, $subject->id))
                            <td scope="col"><a href="" class="drop" role="student" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}">Drop</a></td>
                            @else
                            <td scope="col"><a href="" class="join" role="student" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}">Join</a></td>
                            @endif
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col"><a href="">-</a></td>
                            <td scope="col">-</td>
                            <td scope="col" style="text-transform: capitalize"><a href="">-</a></td>
                            <td scope="col"><a href="" class="join" role="student">Join</a></td>
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