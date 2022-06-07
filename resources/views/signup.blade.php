<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patron - Signup</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <meta name="keywords" content="patron online quiz platform forr creating online quiz for students in schools and universities, that helps teachers and students in the education proccess with less effort and cost" />
    <meta name="description" content="We provide integrated, educational-leading technology that enables teachers to make an online quiz to their students in a modern way and get analyzed feedback about the answers of the students." />
    <link rel="icon" href="images/icon.png" />
    <script>
        addEventListener(
            "load",
            function() {
                setTimeout(hideURLbar, 0);
            },
            false
        );

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!--/Style-CSS -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sign_style.css') }}" type="text/css" media="all" />
    <!--//Style-CSS -->
</head>

<body>
    <!-- /sginup-section -->
    <section class="w3l-login-6">
        <div class="login-hny">
            <div class="form-content">
                <div class="form-right ">
                    <div class="overlay">
                        <div class="grid-info-form">
                            <h2><a href="index.php">PATRON</a></h2>
                            <h3>CREATE ACCOUNT</h3>
                            <p>
                                Patron is an platform that provides integrated,
                                educational-leading technology that enables teachers to make
                                an online quiz to their students in a modern way and get
                                analyzed feedback about the answers of the students.
                            </p>
                            <h5>Already have account?</h5>
                            <a href="login.php" class="read-more-1 btn">Login</a>
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
                        <!-- Success Message -->
                        <!-- <div class="alert alert-success" role="alert">
                            <i class="far fa-check-circle"></i>
                        </div> -->
                        <div class="form-input">
                            <label for="fn">First Name</label>
                            <input type="text" id="fn" name="first_name" value="{{old('first_name')}}" placeholder="eg. John" required />
                        </div>
                        <div class="form-input">
                            <label for="ln">Last Name</label>
                            <input type="text" id="ln" name="last_name" value="{{old('last_name')}}" placeholder="eg. Doe" required />
                        </div>
                        <div class="form-input">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="example@exp.com" required />
                        </div>
                        <div class="form-input">
                            <label for="pass">Password</label>
                            <input type="password" id="pass" name="password" value="{{old('password')}}" placeholder="" required />
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
                            © 2020 <a href="index.php" target="_blank">PATRON</a>. All
                            rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>

    <script>
        $("html").niceScroll({
            cursorcolor: "#ff7d66",
            cursorwidth: "7px",
            cursorborder: 0,
            cursorborderradius: "3px",
        });
    </script>
</body>

</html>