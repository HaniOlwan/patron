<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patron - Login</title>
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
    <!--    <link rel="stylesheet" href="css/bootstrap.css">-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sign_style.css') }}" type="text/css" media="all" />
    <!--//Style-CSS -->
</head>

<body>
    <!-- /sginup-section -->
    <section class="w3l-login-6">
        <div class="login-hny">
            <div class="form-content">
                <div class="form-right">
                    <div class="overlay">
                        <div class="grid-info-form">
                            <h2><a href="index.php">PATRON</a></h2>
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
                            <input type="password" id="pass" name="password" value="{{old('password')}}" placeholder="Password" required minlength="3"/>
                        </div>
                        <button class="btn" type="submit" name="login">Login</button>
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
    <!-- //sginup-section -->

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