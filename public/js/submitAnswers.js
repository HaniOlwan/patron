
const submitAnswers = (questions) => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '/student/' + window.localStorage.getItem('quiz') + '/submit-quiz',
        type: 'POST',
        data: {
            subjectId: localStorage.getItem('subject'),
            'questions': JSON.parse(questions),
        },
        success: function (response) {
            if (response.status === 400) {
                alertMsg.textContent = response.message;
            } else {
                window.localStorage.clear();
                window.location.reload();
            }
        },
        error: function (result) {
            console.log("Some error occured")
        }
    });
}