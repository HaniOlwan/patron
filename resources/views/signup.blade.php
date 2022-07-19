@extends('layouts.sign')
@section('title','Patron - Signup')
@section('content')
<!-- /sginup-section -->
<section class="w3l-login-6">
    <div class="login-hny">
        <div class="form-content">
            <div class="form-right ">
                <div class="overlay">
                    <div class="grid-info-form">
                        <h2><a href="/">PATRON</a></h2>
                        <h3>CREATE ACCOUNT</h3>
                        <p>
                            Patron is an platform that provides integrated,
                            educational-leading technology that enables teachers to make
                            an online quiz to their students in a modern way and get
                            analyzed feedback about the answers of the students.
                        </p>
                        <h5>Already have account?</h5>
                        <a href="/signin" class="read-more-1 btn">Login</a>
                    </div>
                </div>
            </div>
            <div class="form-left">
                <div class="middle">
                    <h4>Join Us</h4>
                    <p>Create Your Account, It's Free.</p>
                </div>
                <form action="/signup" method="post" class="signin-form">
                    @csrf
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="far fa-times-circle"></i>
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-input">
                        <label for="fn">First Name</label>
                        <input type="text" id="fn" name="first_name" value="{{old('first_name')}}" required />
                    </div>
                    <div class="form-input">
                        <label for="ln">Last Name</label>
                        <input type="text" id="ln" name="last_name" value="{{old('last_name')}}" required />
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" required />
                    </div>
                    <div class="form-input">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="password" value="{{old('password')}}" required minlength="3" />
                    </div>
                    <label for="rule">Account Rule</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="teacher" name="rule" value="teacher" class="custom-control-input" required />
                        <label class="custom-control-label radio" for="teacher">Teacher</label>
                        <input type="radio" id="student" name="rule" value="student" class="custom-control-input" required />
                        <label class="custom-control-label radio" for="student">Student</label>
                    </div>

                    <button class="btn" type="submit" name="signin">Create account</button>
                </form>
                <div class="copy-right text-center">
                    <p>
                        © 2020 <a href="/" target="_blank">PATRON</a>. All
                        rights reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection