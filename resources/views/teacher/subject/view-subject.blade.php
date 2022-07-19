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
                        <h3>{{$subject->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <div class="container">
        <div class="create row">
            <div class="col ">
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
                                <td>Instructor name</td>
                                <td>{{ ucfirst($subject->teacher->first_name." ".$subject->teacher->last_name)}}</td>
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
                                <td># Participants</td>
                                <td><a href="/participants">{{ $subject->students->count() }}</a></td>
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
                <a href="/edit-subject/{{ $subject->id }}">Edit subject</a>
                <a href="" class="delete_btn" data-toggle="modal" data-target="#myModal" data-id="{{ $subject->id }}" data-url="subject"">Delete Subject</a>
                <a href=" /question-bank/{{ $subject->id}}">Manage Question Bank</a>
                <a href="/quiz/{{ $subject->id }}/create-quiz">Create new Quiz</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quiz title</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @foreach($subject->quizzes as $quiz)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col"><a href="">{{ $quiz->title }}</a></td>
                            <td scope="col">{{$quiz->questions->count()}}</td>
                            <td scope="col"><a href="">{{ $quiz->students->count() }}</a></td>
                            <td scope="col"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $quiz->id }}" data-url="quiz"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" id="students">
            <div class="col">
                <h3>Participant Students</h3>
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
                        $row_count =1;
                        @endphp
                        @foreach($subject->students as $student)
                        <tr>
                            <td scope="row">{{ $row_count++ }}</td>
                            <td scope="col" style="text-transform: capitalize">{{ $student->first_name." ".$student->last_name }}<a href=""></a></td>
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
<script src="{{ asset('js/deleteModal.js') }}"></script>
@endsection