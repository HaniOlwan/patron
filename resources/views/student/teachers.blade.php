@extends('layouts.student')
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
                            <th scope="col">Teacher name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count = 1;
                        @endphp
                        @if($teachers->count() > 0)
                        @foreach($teachers as $teacher)
                        <tr>
                            <td scope="row">{{$row_count++}}</td>
                            <td scope="col"><a href="/student/teacher/{{$teacher->id}}">{{$teacher->first_name." ".$teacher->last_name}}</a></td>
                            <td scope="col">{{$teacher->email}}</td>
                            <td scope="col">{{$teacher->gender }}</td>
                            <td scope="col">{{$teacher->phone}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td scope="row">{{$row_count++}}</td>
                            <td scope="col"><a href="">-</a></td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                        </tr>
                        @endif
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