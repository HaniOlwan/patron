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
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('error')}}
                    </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session()->get('success')}}
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
                            <th scope="col"><a href="view-topic.php?topic_id= echo $topic_id&subject_id= echo $id">{{ $topic->title }}</a></th>
                            <th scope="col"> echo $questions_count</th>
                            <th scope="col"><a href="/topic/{{ $topic->id }}/edit"><i class="fas fa-pencil-alt"></i></a></th>
                            <th scope="col"><a onclick="return confirm('Are you sure deleting topic ? \nBy deleting the topic everything related to this topic will be deleted such as questions, students answers and analysis for this topic, and you will not be able to recover this data anymore!')" href="question-bank.php?subject_id= echo $id&delete_topic= echo $topic_id"><i class="fas fa-trash-alt"></i></a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>All Questions</h3>
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
                            <th scope="col">Topic</th>
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
                            <th scope="row"> question no</th>
                            <th scope="col"><a href="view-topic.php?topic_id= echo $topic_id&subject_id= echo $id"> topic_title</a></th>
                            <th scope="col"> question</th>
                            <th scope="col"> ['answer1']</th>
                            <th scope="col"> ['answer2']</th>
                            <th scope="col"> ['answer3']</th>
                            <th scope="col"> ['answer4']</th>
                            <th scope="col"><a href="edit-question.php?question_id= echo $question_id"><i class="fas fa-pencil-alt"></i></a></th>
                            <th scope="col"><a onclick="return confirm('Are you sure deleting question ? \nBy deleting the question everything related to this question will be deleted such as students answers and analysis for this question, and you will not be able to recover this data anymore!')" href="question-bank.php?subject_id= echo $id&delete_question= echo $question_id"><i class="fas fa-trash-alt"></i></a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

@endsection