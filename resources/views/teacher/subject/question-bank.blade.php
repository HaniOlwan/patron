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
                        <h3><span> echo $subject_title</span><br>Questions Bank</h3>

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
                <a href="/topic/{{ $subject->subject_id }}">Add new topic</a>
                <a href="/subject/{{ $subject->subject_id }}/create-quiz">Create new Quiz</a>
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
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-topic-id="{{ $topic->id }}"></i></a></td>
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
                            <td scope="col"><a><i class="fas fa-trash-alt question_delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-question-id="{{ $question->id }}"></i></a></td>
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
                <p>Do you really want to delete this subject? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger active delete_record">Delete</button>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{{ csrf_token() }}">



<script>
    const token = document.querySelector('meta[name="_token"]').content;

    const deleteButton = document.querySelector('.delete_record');

    const deleteIcon = document.querySelector('.delete_icon');
    deleteIcon.addEventListener('click', (e) => {
        var selectedId = e.target.getAttribute('data-topic-id');
        deleteButton.setAttribute('data-topic-id', selectedId);
    })

    deleteButton.addEventListener('click', (e) => {
        const topic_id = e.target.getAttribute('data-topic-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        });
        $.ajax({
            url: '{{ URL::to("/topic") }}/' + topic_id,
            type: 'DELETE',
            success: function(result) {
                if (result.success) {
                    window.location.reload();
                }
            },
            error: function(result) {
                console.log("Some error occured")
            }
        });
    })


    const questionIcon = document.querySelector('.question_delete_icon');
    questionIcon.addEventListener('click', (e) => {
        var selectedId = e.target.getAttribute('data-question-id');
        deleteButton.setAttribute('data-question-id', selectedId);
    })

    deleteButton.addEventListener('click', (e) => {
        const question_id = e.target.getAttribute('data-question-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        });

        $.ajax({
            url: '{{ URL::to("/question") }}/' + question_id,
            type: 'DELETE',
            success: function(result) {
                if (result.success) {
                    window.location.reload();
                }
            },
            error: function(result) {
                console.log("Some error occured")
            }
        });
    })
</script>

@endsection