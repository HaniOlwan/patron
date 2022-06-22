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
                        <h3>Subject: <span>{{ $subject->title }}</span><br>Create Quiz</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form method="post">
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

                    <div class="form-group row">
                        <label for="quiz-title" class="col-sm-2 col-form-label">Quiz title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="" class="form-control" id="quiz-title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Select-topics" class="col-sm-2 col-form-label">Select topics </label>
                        <span class="select-topics">&#40;select which topics are included in the quiz and amount of questions from each topic&#41;</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-10">
                            <div class="topic custom-control custom-checkbox">
                                <input type="checkbox" name="selected_topic[]" class="custom-control-input" value=" echo $topic_id . ',' . $i; ?>" id=" echo $topic_id; ?>">
                                <label class="custom-control-label" for=" echo $topic_id; ?>"></label>
                                <input type="number" name="questions_count_ echo $i; ?>" placeholder="of  echo $count; ?>" class="form-control" id=" echo $topic_id; ?>">

                            </div>
                        </div>
                        <div class="alert alert-danger" role="alert" style="margin: 0 auto; margin-bottom: 20px ">
                            {{$subject->title}} . ' does not have any topics yet, try to add topics and questions first. '; ?>
                            <a href="add-topic.php?subject_id= echo $subject_id; ?>">Add Topic</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Start date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" value=" echo $start_date; ?>" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Start time</label>
                        <div class="col-sm-10">
                            <input type="time" name="start_time" value=" echo $start_time; ?>" class="form-control" id="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-date" class="col-sm-2 col-form-label">Deadline date</label>
                        <div class="col-sm-10">
                            <input type="date" name="exp_date" value=" echo $exp_date; ?>" class="form-control" id="exp-date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exp-time" class="col-sm-2 col-form-label">Deadline time</label>
                        <div class="col-sm-10">
                            <input type="time" name="exp_time" value=" echo $exp_time; ?>" class="form-control" id="exp-time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="duration" class="col-sm-2 col-form-label">Select duration <span class="minutes">&#40;minutes&#41;</span></label>
                        <div class="col-sm-10">
                            <input type="number" name="duration" value=" echo $duration; ?>" class="form-control" id="duration">

                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" name="create_quiz" class="btn btn-primary">Create Quiz</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
@endsection