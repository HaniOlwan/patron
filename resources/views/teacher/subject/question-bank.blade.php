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
                        <h3><span>{{ $subject->title }}</span><br>Questions Bank</h3>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="add row">
            <!--
            <div class="col">
                <form class="form-inline my-2 my-lg-0">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search for topic or question ..." aria-label="Search">

                </form>
            </div>
-->
            <div class="col text-right">
                <a href="/topic/{{ $subject->id }}">Add new topic</a>
                <a href="/subject/{{ $subject->id }}/create-quiz">Create new Quiz</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>All Topics</h3>
                @if(session()->has('topic_error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('topic_error')}}
                </div>
                @endif
                @if(session()->has('topic_success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('topic_success')}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Number of question</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count=1
                        @endphp
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ $row_count++ }}</th>
                            <th scope="col"><a href="/view-topic/{{ $topic->id }}}">{{ $topic->title }}</a></th>
                            <th scope="col">{{ $topic->question->count() }}</th>
                            <th scope="col"><a href="/topic/{{ $topic->id }}/edit"><i class="fas fa-pencil-alt"></i></a></th>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_btn" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $topic->id }}" data-url="topic" subject-id="{{ $topic->subject->subject_id }}"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>All Questions</h3>
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
                            <th scope="col">Topic</th>
                            <th scope="col">Question</th>
                            <th scope="col">Ansr 1</th>
                            <th scope="col">Ansr 2</th>
                            <th scope="col">Ansr 3</th>
                            <th scope="col">Ansr 4</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($questions as $question)
                        <tr>
                            <th scope="row"> question no</th>
                            <th scope="col"><a href="view-topic.php?topic_id= echo $topic_id&subject_id= echo $id">{{ $question->topic->title }}</a></th>
                            <th scope="col">{{ $question->title }}</th>
                            <th scope="col">{{ $question->first_answer }}</th>
                            <th scope="col">{{ $question->second_answer }}</th>
                            <th scope="col">{{ $question->third_answer }}</th>
                            <th scope="col">{{ $question->forth_answer }}</th>
                            <th scope="col"><a href="/question/{{ $question->id }}/edit"><i class="fas fa-pencil-alt"></i></a></th>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $question->id }}" data-url="question"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
<!-- Delete Modal -->
<div id="myModal" class="modal">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you really want to delete this record? This process cannot be undone.</p>
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