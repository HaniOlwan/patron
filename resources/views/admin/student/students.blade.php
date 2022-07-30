@extends('layouts.admin')
@section('content')
<div class="cd-content-wrapper">
    <div class="container">
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
                            <th scope="col">Students name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Joined subjects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count = 1;
                        @endphp
                        @foreach($students as $student)
                        <tr>
                            <td scope="row">{{$row_count++}}</td>
                            <td scope="col"><a href="/admin/student/{{$student->id}}">{{$student->first_name." ".$student->last_name}}</a></td>
                            <td scope="col">{{$student->email}}</td>
                            <td scope="col">{{$student->gender }}</td>
                            <td scope="col">{{$student->phone}}</td>
                            <td scope="col"><a href="/admin/student/{{$student->id}}/subjects">{{ $student->joinedSubjects->count() }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/dropSubject.js') }}"></script>

@endsection