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
                        <h3>Quizzes</h3>
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

                    <input class="form-control mr-sm-2" type="search" placeholder="Search for quiz ..." aria-label="Search">

                </form>
            </div> -->

        </div>
        <div class="row">
            <div class="col">
                <!-- Messages -->
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
                            <th scope="col">Quiz title</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Deadline Date</th>
                            <th scope="col">Deadline Time</th>
                            <th scope="col">Duratuion</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Sample</th>
                            <th scope="col">Analysis result</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $row_count =1;
                        @endphp
                        @if($quizzes->count() > 0)
                        @foreach($quizzes as $quiz)
                        <tr>
                            <td scope="col">{{ $row_count++ }}</td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}">{{ $quiz->title }}</a></td>
                            <td scope="col"><a href="/subject/{{ $quiz->subject->id }}">{{ $quiz->subject->title }}</a></td>
                            <td scope="col">{{ $quiz->deadline_date }}</td>
                            <td scope="col">{{ $quiz->deadline_time }}</td>
                            <td scope="col">{{ $quiz->duration }} m</td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}/participants">{{ $quiz->students->count() }}</a></td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}/sample" target="_blank"><i class="far fa-file-alt"></i></a></td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}/analysis-results"><i class="fas fa-chart-pie"></i></a></td>
                            <td scope="col"><a href="/quiz/{{ $quiz->id }}/edit-quiz"><i class="fas fa-pencil-alt"></i></a></td>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $quiz->id }}" data-url="quiz"></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td scope="col">{{ $row_count }}</td>
                            <td scope="col"><a href="">-</a></td>
                            <td scope="col"><a href="">-</a></td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col">-</td>
                            <td scope="col"><a href="/quiz">-</a></td>
                            <td scope="col"><a href="/quiz" target="_blank"><i class="far fa-file-alt"></i></a></td>
                            <td scope="col"><a href="/quiz"><i class="fas fa-chart-pie"></i></a></td>
                            <td scope="col"><a href="/quiz"><i class="fas fa-pencil-alt"></i></a></td>
                            <td scope="col"><a><i class="fas fa-trash-alt delete_icon" type="button" data-toggle="modal" data-target="#myModal" data-id="" data-url="quiz"></i></a></td>
                        </tr>
                        @endif
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
                <button type="button" class="btn btn-danger active delete_modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{{ csrf_token() }}">
<script src="{{ asset('js/deleteModal.js') }}"></script>
@endsection