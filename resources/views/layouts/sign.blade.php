<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
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
    @yield('content')
</body>

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

</html>