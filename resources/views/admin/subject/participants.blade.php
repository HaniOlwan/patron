@extends('layouts.admin')
@section('content')
<div class="cd-content-wrapper">
    <div class="container">
        <h2 class="mt-4 mb-4">Assigned Teachers to {{ $subject->title }}</h2>
        <div class="row">
            <div class="col">
                @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('error') }}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Teacher name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count = 1;
                        @endphp
                        @foreach($subject->teachers as $teacher)
                        <tr>
                            <td scope="row">{{$row_count++}}</td>
                            <td scope="col"><a href="/admin/teacher/{{$teacher->id}}">{{$teacher->first_name." ".$teacher->last_name}}</a></td>
                            <td scope="col">{{$teacher->email}}</td>
                            <td scope="col">{{$teacher->gender }}</td>
                            <td scope="col">{{$teacher->phone}}</td>
                            @if(!isTeacherAssigned($teacher->id, $subject->id))
                            <td scope="col"><a href="" class="join" role="admin" subject-id="{{ $subject->id }}" teacher-id="{{ $teacher->id }}" data-status="{{ $subject->private }}" style="text-align:center">Assign</a></td>
                            @else
                            <td scope="col"><a href="" class="drop" role="admin" subject-id="{{ $subject->id }}" teacher-id="{{ $teacher->id }}" data-status="{{ $subject->private }}" style="text-align:center">Drop</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/assignTeacher.js') }}"></script>
<script src="{{ asset('js/dropSubject.js') }}"></script>

@endsection