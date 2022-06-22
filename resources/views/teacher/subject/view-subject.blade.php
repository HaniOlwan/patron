
<div class="cd-content-wrapper">
    <!-- main content here -->
    <div class="container-fluid no-gutters">
        <div class="row no-gutters">
            <div class="col">
                <div class="hero hero-subject">
                    <div class="layout">
                        <h3><span> echo $subject_title; ?></span></h3>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="create row">
            <div class="col ">
                <div class="subject-details">
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Subject title</td>
                                <td> echo $subject_title; ?></td>
                            </tr>
                            <tr>
                                <td>Subject id</td>
                                <td> echo $row['subject_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Instructor name</td>
                                <td> echo $teacher_fn; ?>  echo $teacher_ln; ?></td>
                            </tr>
                            <tr>
                                <td>Subject code <span>&#40;students can join subject only via this code&#41;</span></td>
                                <td> echo $subject_code; ?></td>
                            </tr>
                            <tr>
                                <td>Subject description</td>
                                <td>echo $row['description']; ?></td>
                            </tr>
                            <tr>
                                <td># Participants</td>
                                <td><a href="#students"> echo $students_count; ?></a></td>
                            </tr>
                            <tr>
                                <td># Number of quizzes</td>
                                <td>echo $quizzes_count; ?></td>
                            </tr>
                            <tr>
                                <td class="last">Created in</td>
                                <td class="last"> echo $row['creation_date']; ?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="add row">
            <div class="col text-right ">
                <a href="edit-subject.php?subject_id= echo $subject_id; ?>">Edit subject</a>
                <a onclick="return confirm('Are you sure deleting subject echo $subject_title; ?> ? \nBy deleting the subject everything related to this subject will be deleted such as topics, questions and quizzes, and you will not be able to recover this data anymore!')" href="subjects.php?delete= echo $subject_id; ?>">Delete Subject</a>
                <a href="question-bank.php?subject_id= echo $subject_id; ?>">Manage Question Bank</a>
                <a href="create-quiz.php?subject_id= echo $subject_id; ?>">Create new Quiz</a>
            </div>
        </div>
            <div class="row">
                <div class="col">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Quiz title</th>
                                <th scope="col">Questions</th>
                                <th scope="col">Participants</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td scope="row"> echo $quiz_number; ?></td>
                                    <td scope="col"><a href="quiz-details.php?quiz_id= echo $row4['id']; ?>&subject_id= echo $subject_id; ?>"> echo $row4['quiz_title']; ?></a></td>
                                    <td scope="col"> echo $questions_count; ?></td>
                                    <td scope="col"><a href="quiz-details.php?quiz_id= echo $row4['id']; ?>&subject_id= echo $subject_id; ?>#students"> echo $students_count; ?></a></td>
                                    <td scope="col"><a href="edit-quiz.php?quiz_id= echo $row4['id']; ?>&subject_id= echo $subject_id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                                    <!-- <td scope="col"><a onclick="return confirm('Are you sure deleting quiz  echo $row4['quiz_title']; ?> ? \nBy deleting the quiz everything related to this quiz will be deleted such as students answers and analysis, and you will not be able to recover this data anymore!')" href="view-subject.php?subject_id= echo $subject_id; ?>&delete_quiz= echo $quiz_id; ?>"><i class="fas fa-trash-alt"></i></a></td> -->
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row" id="students">
                <div class="col">
                    <h3>Participant Students</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                        <td scope="row"> echo $student_number; ?></td>
                                        <td scope="col" style="text-transform: capitalize"><a href="teacher-profile.php?id= echo $student_id; ?>"> echo $row8['first_name']; ?>  echo $row8['last_name']; ?></a></td>
                                        <td scope="col">echo $row8['email']; ?></td>
                                        <td scope="col"> echo $row8['gender']; ?></td>
                                        <td scope="col"> echo $row8['phone']; ?></td>
                                        <td scope="col"><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </div> <!-- .cd-content-wrapper -->
</main> <!-- .cd-main-content -->
