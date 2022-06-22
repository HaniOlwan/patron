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
                        <h3><span>{{ $subject->title }}</span><br>Add Topic</h3>
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
                    @csrf
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
                        <label for="topic" class="col-sm-2 col-form-label">Topic title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="" id="topic" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" name="create" class="btn btn-primary">Add Topic</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

@endsection