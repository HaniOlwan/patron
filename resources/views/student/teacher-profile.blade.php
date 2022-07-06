@extends('layouts.teacher')

@section('content')
<div class="cd-content-wrapper">
    @section('header')
    <div class="container-fluid no-gutters">
        <div class="row no-gutters justify-content-between">
            <div class="hero hero-profile">
                <div class="layout">
                    <div class="col-lg-5">
                        <div class="user-image">
                            <img src="{{ asset('/images/users/default.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="user-info">
                            <h3 style="text-transform: capitalize">{{ $teacher->first_name." ".$teacher->last_name }}</h3>
                            <h5 style="text-transform: capitalize">{{ $teacher->specialization }}</h5>
                            <h6 style="text-transform: capitalize">{{ $teacher->rule }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <div class="container">
        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
        </div>
        @else
        <div class="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="dash-cards col">
                <div class="card dash-card bg-light mb-3">
                    <div class="card-header">
                        <h3>Bio</h3>
                        <div class="icon mr-auto"><i class="fas fa-globe-americas"></i></div>

                    </div>
                    <div class="card-body" style="overflow:auto; height:400px;">
                        <p class="card-text">{{ $teacher->bio }}</p>

                    </div>
                </div>
            </div>
            <div class="dash-cards col">
                <div class="card dash-card bg-light mb-3">
                    <div class="card-header">
                        <h3>Information</h3>
                        <div class="icon mr-auto"><i class="fas fa-info-circle"></i></div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><i class="fas fa-transgender"></i>Gender: {{ $teacher->gender }}</p>
                        <p class="card-text"><i class="fas fa-at"></i>Email: {{ $teacher->email }}</p>
                        <p class="card-text"><i class="fas fa-mobile-alt"></i>Phone: {{ $teacher->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="dash-cards col-lg-12">
                <div class="card dash-card bg-light mb-3">
                    <div class="card-header">
                        <h3>Statistics</h3>
                        <div class="icon mr-auto"><i class="fas fa-database"></i></div>

                    </div>
                    <div class="card-body statistics">
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
                                    <th scope="col">Subject title</th>
                                    <th scope="col">Subject id</th>
                                    <th scope="col">Subject code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $subjects = $teacher->joinedSubjects;
                                $row_count = 1;
                                @endphp
                                @if($teacher->subjects)
                                @foreach($teacher->subjects as $subject)
                                <tr>
                                    <td scope="row">{{ $row_count++ }}</td>
                                    <td scope="col"><a href="/teacher/view-subject/{{ $subject->id }}">{{ $subject->title }}</a></td>
                                    <td scope="col">{{ $subject->subject_id }}</td>
                                    <td scope="col">{{ $subject->code }}</td>
                                    <td scope="col"><i class="{{$subject->private== '1' ? 'fas fa-lock' : 'fas fa-lock-open'}}"></i> {{$subject->private== '1' ? 'Private' : 'Public'}}</td>
                                    @if(studentJoinedSubject(Auth::user()->id, $subject->id))
                                    <td scope="col"><a href="" class="drop" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}" style="text-align:center">Drop</a></td>
                                    @else
                                    <td scope="col"><a href="" class="join" subject-id="{{ $subject->id }}" data-status="{{ $subject->private }}" style="text-align:center">Join</a></td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
</div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->

<script src="{{ asset('js/dropSubject.js') }}"></script>
<script src="{{ asset('js/joinSubject.js') }}"></script>

@endsection