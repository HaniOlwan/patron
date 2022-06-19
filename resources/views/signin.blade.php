@extends('layouts.sign')
@section('title','Patron Login')
@section('content')
<section class="w3l-login-6">
    <div class="login-hny">
        <div class="form-content">
            <div class="form-right">
                <div class="overlay">
                    <div class="grid-info-form">
                        <h2><a href="/">PATRON</a></h2>
                        <h3>LOGIN</h3>
                        <p>
                            Patron is an platform that provides integrated,
                            educational-leading technology that enables teachers to make
                            an online quiz to their students in a modern way and get
                            analyzed feedback about the answers of the students.
                        </p>
                        <h5>Does not have account yet?</h5>
                        <a href="/signup" class="read-more-1 btn">Register now</a>
                    </div>
                </div>
            </div>
            <div class="form-left">
                <div class="middle">
                    <h4>Login</h4>
                    <p>Patron wishes you a good day.</p>
                </div>
                <form action="/signin" method="post" class="signin-form">
                    @csrf
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="far fa-times-circle"></i>
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="example@exp.com" required />
                    </div>
                    <div class="form-input">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="password" value="" placeholder="Password" required minlength="3" />
                    </div>
                    <button class="btn" type="submit" name="login">Login</button>
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