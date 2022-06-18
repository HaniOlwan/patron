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
                        <h3>Create Subject</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form action="/teacher/create-subject" method="post">
                    @csrf
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="Subject-title" class="col-sm-2 col-form-label">Subject title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="Subject-title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Subject-id" class="col-sm-2 col-form-label">Subject id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject_id" id="Subject-id" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Subject-description" class="col-sm-2 col-form-label">Subject description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="Subject-description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Privacy" class="col-sm-2 col-form-label">Privacy</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="private" value="private" id="private" checked>
                                <label class="custom-control-label" for="private">Private</label>
                                <span>*Private means students can join subject only via subject join code, else any student can join subject.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Create Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</main>
@endsection