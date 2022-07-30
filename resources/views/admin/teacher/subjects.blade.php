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
                            <th scope="col">Subject title</th>
                            <th scope="col">Subject id</th>
                            <th scope="col">Subject code</th>
                            <th scope="col">Status</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $subjects = $teacher->joinedSubjects;
                        $row_count = 1;
                        @endphp
                        @foreach($teacher->assignedSubjects as $subject)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col"><a href="/admin/subject/{{ $subject->id }}">{{ $subject->title }}</a></td>
                            <td scope="col">{{ $subject->subject_id }}</td>
                            <td scope="col">{{ $subject->code }}</td>
                            <td scope="col"><i class="{{$subject->private== '1' ? 'fas fa-lock' : 'fas fa-lock-open'}}"></i> {{$subject->private== '1' ? 'Private' : 'Public'}}</td>
                            <td scope="col"><a href="" class="drop" subject-id="{{ $subject->id }}" teacher-id="{{ $teacher->id }}" data-status="{{ $subject->private }}" style="text-align:center">Drop</a></td>
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