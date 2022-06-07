<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patron| Teacher</title>
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
            <h1><a href="/" class="cd-logo">PATRON</a></h1>
        </div>

        <div class="cd-search js-cd-search">
            <form>
                <input class="reset" type="search" placeholder="Search...">
            </form>
        </div>

        <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>

        <ul class="cd-nav__list js-cd-nav__list">

            <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

                <a href="teacher-profile.php?id=1">
                    <i class="far fa-user-circle"></i>
                    <span>Teacher Name</span>
                </a>

                <ul class="cd-nav__sub-list">
                    <li class="cd-nav__sub-item">
                        <a href="/profile"> Profile</a>
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
                    <a href="dashboard.php"><i class="fas fa-home"></i> Home</a>

                </li>

                <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">

                    <a href="subjects.php"><i class="fas fa-book-open"></i> Subjects<span class="cd-count">@yield('subject_count')</span></a>

                    <ul class="cd-side__sub-list">
                        <li class="cd-side__sub-item"><a href="subjects.php"><i class="fas fa-server"></i> View subjects</a></li>
                        <li class="cd-side__sub-item"><a href="create-subject.php"><i class="fas fa-plus-circle"></i> Create subject</a></li>
                    </ul>
                </li>

                <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">

                    <a href="/quizzez"><i class="fas fa-question-circle"></i> Quizzes<span class="cd-count">@yield('quiz_count')</span></a>

                    <ul class="cd-side__sub-list">
                        <li class="cd-side__sub-item"><a href="view-quizzes.php"><i class="fas fa-server"></i> View quizzes</a></li>
                    </ul>
                </li>

                <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
                    <a href="/results"><i class="fas fa-chart-pie"></i> Analysis results</a>


                </li>
            </ul>
        </nav>
        <div class="cd-content-wrapper">
            <!-- main content here -->
            <div class="container-fluid no-gutters">
                <div class="row no-gutters">

                    <div class="col">
                        <div class="hero hero-dashboard">
                            <div class="layout">
                                <h3>Hi <span>Teacher</span></h3>
                                <p>we wish you having a good day.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row">

                    <div class="dash-cards col-lg-4">
                        <div class="card dash-card bg-light mb-3">
                            <div class="card-header">

                                <div class="head">
                                    <h3>Subjects</h3>
                                    <a href="subjects.php">View more ></a>
                                </div>
                                <i class="dash-icon fas fa-book-open"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Here you can create subjects for your students, view and manage all your subjects easly.</p>
                                <a href="create-subject.php">Create new Subject</a>
                            </div>
                        </div>
                    </div>
                    <div class="dash-cards col-lg-4">
                        <div class="card dash-card bg-light mb-3">
                            <div class="card-header">
                                <div class="head">
                                    <h3>Quizzes</h3>
                                    <a href="view-quizzes.php">View more ></a>
                                </div>
                                <i class="dash-icon fas fa-question-circle"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Here you can create unlimited amount of quizzes, and view all your quizzes for all your subjects.</p>
                                <a href="view-quizzes.php">View all quizzes </a>
                            </div>
                        </div>
                    </div>
                    <div class="dash-cards col-lg-4">
                        <div class="card dash-card bg-light mb-3">
                            <div class="card-header">
                                <div class="head">
                                    <h3>Quizzes Results</h3>
                                    <a href="view-results.php">View more ></a>
                                </div>
                                <i class="dash-icon fas fa-chart-pie"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Here you will get all the analysis results for all the quizzes you made for all your subjects.</p>
                                <a href="view-results.php">View results</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/menu-aim.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>