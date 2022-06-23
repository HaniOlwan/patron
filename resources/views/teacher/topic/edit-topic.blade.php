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
                        <h3><span>{{ $subject->title }}</span><br>Edit Topic</h3>
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
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="topic" class="col-sm-2 col-form-label">Topic title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ $topic->title }}" id="topic" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" name="create" class="btn btn-primary">Edit Topic</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

@endsection