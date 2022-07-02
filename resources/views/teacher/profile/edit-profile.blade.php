@extends('layouts.teacher')
@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Edit Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        <div class="create row">
            <div class="col ">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

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
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fn">First name</label>
                            <input type="text" style="text-transform: capitalize" class="form-control" id="fn" name="first_name" value="{{ $teacher->first_name }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ln">Last name</label>
                            <input type="text" style="text-transform: capitalize" class="form-control" id="ln" name="last_name" value="{{ $teacher->last_name }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $teacher->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Gender">Gender</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="male" name="gender" value="male" class="custom-control-input" {{$teacher->gender == 'male' ? 'checked' : ''}} />
                                <label class="custom-control-label radio" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="female" name="gender" value="female" class="custom-control-input" {{$teacher->gender == 'female' ? 'checked' : ''}} />
                                <label class="custom-control-label radio" for="female">Female</label>
                            </div>
                            <!--
                            <select id="Gender" class="form-control" name="gender">
                                <option selected>Your gender is...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
-->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="specialization">Specialization</label>
                            <input type="text" class="form-control" id="specialization" placeholder="e.g: Software engineering" name="specialization" value="{{ $teacher->specialization }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" id="phone" placeholder="059 **** ***" name="phone" value="{{ $teacher->phone }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="Bio">Bio</label>
                        <textarea class="form-control" id="Bio" placeholder="Tell people about yourself" name="bio">{{ $teacher->bio }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Profile image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group row ">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Update profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
@endsection