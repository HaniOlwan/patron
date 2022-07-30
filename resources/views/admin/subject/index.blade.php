@extends('layouts.admin')
@section('content')

<div class="cd-content-wrapper">
    <!-- main content here -->
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>{{$subject->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <div class="container">
        <div class="create row">
            <div class="col">
            @if(session()->has('error'))
                <div class="alert alert-danger mt-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('error') }}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success mt-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="subject-details">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Subject title</td>
                                <td>{{$subject->title}}</td>
                            </tr>
                            <tr>
                                <td>Subject id</td>
                                <td>{{ $subject->subject_id }}</td>
                            </tr>
                            <tr>
                                <td>Instructors name</td>
                                <td>Hani Elwan Ahmed Elwan</td>
                            </tr>
                            <tr>
                                <td>Subject code <span>&#40;students can join subject only via this code&#41;</span></td>
                                <td>{{ $subject->code }}</td>
                            </tr>
                            <tr>
                                <td>Subject description</td>
                                <td>{{ $subject->description }}</td>
                            </tr>
                            <tr>
                                <td># Joined Students</td>
                                <td><a href="/subject/{{ $subject->id }}/participants">{{ $subject->students->count() }}</a></td>
                            </tr>
                            <tr>
                                <td># Participant Teachers</td>
                                <td><a href="/subject/{{ $subject->id }}/participants">{{ $subject->students->count() }}</a></td>
                            </tr>
                            <tr>
                                <td># Number of quizzes</td>
                                <td>{{ $subject->quizzes->count() }}</td>
                            </tr>
                            <tr>
                                <td class="last">Created in</td>
                                <td class="last">{{ $subject->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="add row">
            <div class="col text-right ">
                <a href="/admin/assign-teachers/{{ $subject->id }}">Assign Teachers</a>
                <a href="/admin/subject/{{ $subject->id }}/students">View Students</a>
                <a href="/admin/edit-subject/{{ $subject->id }}">Edit Subject</a>
                <a href="" class="delete_btn" data-toggle="modal" data-target="#myModal" data-id="{{ $subject->id }}" data-url="subject"">Delete Subject</a>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
<div id="myModal" class="modal">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you really want to delete this subject? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger active delete_modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/deleteSubject.js') }}"></script>
@endsection