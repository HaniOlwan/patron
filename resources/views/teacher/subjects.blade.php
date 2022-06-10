@extends('layouts.teacher')
@section('title','Subjects')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Subjects</h3>

                    </div>

                </div>withTitle
            </div>
        </div>
    </div>
    @endsection

    <div class="container">
        <div class="add row justify-content-end">
            <div class="col-sm-12 col-lg-4 text-right">
                <a href="/teacher/create-subject">Create new subject</a>
            </div>
        </div>
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
                            <th scope="col">Participants</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count = 1;
                        @endphp
                        @foreach($subjects as $subject )
                        <tr>
                            <td scope="row">{{$row_count++}}</td>
                            <td scope="col"><a href="view-subject/{{$subject->subject_id}}">{{$subject->title}}</a></td>
                            <td scope="col">{{$subject->subject_id}}</td>
                            <td scope="col">{{$subject->code}}</td>
                            <td scope="col"><a href="view-subject/{{$subject->subject_id}}/students">particapants</a></td>
                            <td scope="col"><i class="{{$subject->private== '1' ? 'fas fa-lock' : 'fas fa-lock-open'}}"> </i>{{$subject->private== 1? "private": "public"}}</td>
                            <td scope="col"><a href="edit-subject/{{$subject->subject_id}}"><i class="fas fa-pencil-alt"></i></a></td>
                            <td scope="col"><a><i class="fas fa-trash-alt" type="button" data-toggle="modal" data-target="#myModal"></i></a></td>
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
                <p>Do you really want to delete this subject? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="delete_record" type="button" class="btn btn-danger active">Delete</button>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{{ csrf_token() }}">



<script>
    const deleteButton = document.querySelector('#delete_record');
    const token = document.querySelector('meta[name="_token"]').content;


    deleteButton.addEventListener('click', () => {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        });

        $.ajax({
            url: '{{ URL::to("/teacher") }}' + subject_id,
            data: {
                subject_id
            },
            type: 'DELETE',
            success: function(result) {
                console.log("Record delete")
            },
            error: function(result) {
                console.log("Some error occured")

            }
        });
    })
</script>

@endsection