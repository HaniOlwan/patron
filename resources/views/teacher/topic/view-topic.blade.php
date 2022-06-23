@extends('layouts.teacher')
@section('title','Subjects')
@section('content')

<div class="cd-content-wrapper">
    <!-- main content here -->
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3><span> $subject_title;</span></h3>
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
                                <td>Topic title</td>
                                <td>{{ $topic->title }}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>{{ $subject->title }}</td>
                            </tr>

                            <tr>
                                <td class="last">Number of questions</td>
                                <td class="last"> $questions_count;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="add row">
            <div class="col text-right">
                <a href="/topic/{{ $topic->id }}/edit">Edit topic</a>
                <a href="" class="delete_icon" data-toggle="modal" data-target="#myModal" data-topic-id="{{ $topic->id }}">Delete Topic</a>
                <a href="add-question.php?subject_id= $subject_id;&topic_id= $topic_id;">Add new question</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Questions</h3>
                <!-- <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer 1</th>
                            <th scope="col">Answer 2</th>
                            <th scope="col">Answer 3</th>
                            <th scope="col">Answer 4</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">no</th>
                            <th scope="col"> ['question']</th>
                            <th scope="col"> $row3['answer1'];</th>
                            <th scope="col"> $row3['answer2'];</th>
                            <th scope="col"> $row3['answer3'];</th>
                            <th scope="col"> $row3['answer4'];</th>
                            <th scope="col"><a href="edit-question.php?question_id= $question_id;&topic_id= $topic_id;"><i class="fas fa-pencil-alt"></i></a></th>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-topic-id="{{ $topic->id }}"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                <p>Do you really want to delete this Topic? This process cannot be undone.</p>
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
                    history.back()
                }
            },
            error: function(result) {
                console.log("Some error occured")
            }
        });
    })
</script>
@endsection