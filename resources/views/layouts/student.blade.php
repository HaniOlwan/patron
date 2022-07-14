<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patron| Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="patron online quiz platform forr creating online quiz for students in schools and universities, that helps teachers and students in the education proccess with less effort and cost" />
    <meta name="description" content="We provide integrated, educational-leading technology that enables teachers to make an online quiz to their students in a modern way and get analyzed feedback about the answers of the students." />
    <link rel="icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/nav-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="cd-main-header js-cd-main-header">
        <div class="cd-logo-wrapper">
            <h1><a href="/student" class="cd-logo">PATRON</a></h1>
        </div>

        <div class="cd-search js-cd-search">
            <form>
                <input class="reset" type="search" placeholder="Search...">
            </form>
        </div>

        <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>

        <ul class="cd-nav__list js-cd-nav__list">

            <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

                <a href="/student/profile">
                    <i class="far fa-user-circle"></i>
                    <span>{{ Auth::user()->first_name." ".Auth::user()->last_name }}</span>
                </a>

                <ul class="cd-nav__sub-list">
                    <li class="cd-nav__sub-item">
                        <a href="/student/profile"> Profile</a>
                    </li>
                    <li class="cd-nav__sub-item">
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>

    <main class="cd-main-content">
        <nav class="cd-side-nav js-cd-side-nav">
            <ul class="cd-side__list js-cd-side__list">
                <li class="cd-side__label"><span><i class="fas fa-tachometer-alt"></i> Dashboard</span></li>
                <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
                    <a href="/dashboard"><i class="fas fa-home"></i> Home</a>
                </li>

                <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">

                    <a href="/student/subjects"><i class="fas fa-book-open"></i> Subjects<span class="cd-count">{{ Auth::user()->joinedSubjects->count() }}</span></a>

                    <ul class="cd-side__sub-list">
                        <li class="cd-side__sub-item"><a href="/student/subjects"><i class="fas fa-server"></i> View subjects</a></li>
                        <li class="cd-side__sub-item"><a href="/student/join-subject"><i class="fas fa-plus-circle"></i> Join subject</a></li>
                    </ul>
                </li>

                <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">

                    <a href="/student/quizzes"><i class="fas fa-question-circle"></i> Quizzes<span class="cd-count">count</span></a>

                    <ul class="cd-side__sub-list">
                        <li class="cd-side__sub-item"><a href="/student/quizzes/results"><i class="fas fa-server"></i> View quizzes results</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="cd-content-wrapper">
            <div class="container-fluid no-gutters">
                <div class="row no-gutters">

                    <div class="col">
                        <div class="hero hero-dashboard">
                            <div class="layout">
                                @yield('header')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- dynamic content here -->
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/menu-aim.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>