let dropButton = document.querySelectorAll('.drop');

dropButton.forEach((ele) => ele.addEventListener('click', (e) => {
    e.preventDefault();
    let subjectId = e.target.getAttribute('subject-id');
    let teacherId = e.target.getAttribute('teacher-id');
    let studentId = e.target.getAttribute('student-id');

    if (confirm("Are you sure you want to drop", "")) {
        let url = '/student/drop-subject/' + subjectId;
        if (teacherId || studentId) {
            url = '/admin/drop-subject/' + subjectId;
        }
        $.ajax({
            url,
            type: 'GET',
            data: {
                teacherId,
                studentId
            },
            success: function (response) {
                if (response.status === 400) {
                    alert('Something went wrong')
                } else {
                    window.location.reload();
                }
            },
            error: function (result) {
                console.log(result)
            }
        });
    }
}
))