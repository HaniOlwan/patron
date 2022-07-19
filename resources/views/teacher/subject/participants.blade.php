@extends('layouts.teacher')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Participants</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

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
                            <th scope="col">Student Name</th>
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
                        @foreach($subject->students as $student)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col" style="text-transform: capitalize"><a href="/student/{{ $student->id }}">{{ $student->first_name." ".$student->last_name }}</a></td>
                            <td scope="col">{{ $student->email }}</td>
                            <td scope="col">{{ $student->gender }}</td>
                            <td scope="col">{{ $student->phone }}</td>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $subject->id }}" data-url="student/{{ $student->id }}/subject"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div id="myModal" class="modal">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you really want to delete this Topic? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger active delete_modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/deleteModal.js') }}"></script>

@endsection