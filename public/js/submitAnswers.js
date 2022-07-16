const token = document.querySelector('meta[name="_token"]').content;
const subjectId = document.querySelector('.subject_id').value;
const quizId = document.querySelector('.quiz_id').value;
const submitAnswers = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '/student/' + quizId + '/submit-quiz',
        type: 'POST',
        data: {
            subjectId,
            quizId
        },
        success: function (response) {
            if (response.status === 400) {
                alertMsg.textContent = response.message;
            } else {
                window.localStorage.clear();
                window.location.href = "/student/view-subject/" + subjectId;
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}