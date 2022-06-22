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
    <main>
        <div class="cd-content-wrapper">
            <!-- main content here
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3>Subject: <span></span><br>Create Quiz</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
            <div class="container">
                <div class="create row">
                    <div class="col ">
                        <form method="post">

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

                            <div class="form-group row">
                                <label for="quiz-title" class="col-sm-2 col-form-label">Quiz title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="" class="form-control" id="quiz-title" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Select-topics" class="col-sm-2 col-form-label">Select topics </label>
                                <span class="select-topics">&#40;select which topics are included in the quiz and amount of questions from each topic&#41;</span>
                            </div>
                            <div class="row">

                                <div class="alert alert-danger" role="alert" style="margin: 0 auto; margin-bottom: 20px ">
                                    subject_title . ' does not have any topics yet, try to add topics and questions first. '
                                    <a href="add-topic.php?subject_id=">Add Topic</a>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Start date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="start_date" value=" " class="form-control" id="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-sm-2 col-form-label">Start time</label>
                                <div class="col-sm-10">
                                    <input type="time" name="start_time" value=" " class="form-control" id="time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exp-date" class="col-sm-2 col-form-label">Deadline date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="exp_date" value="" class="form-control" id="exp-date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exp-time" class="col-sm-2 col-form-label">Deadline time</label>
                                <div class="col-sm-10">
                                    <input type="time" name="exp_time" value="" class="form-control" id="exp-time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="duration" class="col-sm-2 col-form-label">Select duration <span class="minutes">&#40;minutes&#41;</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="duration" value=" " class="form-control" id="duration">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" name="create_quiz" class="btn btn-primary">Create Quiz</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- .cd-content-wrapper -->
    </main> <!-- .cd-main-content -->

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