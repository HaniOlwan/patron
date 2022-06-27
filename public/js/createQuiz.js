const token = document.querySelector('meta[name="_token"]').content;
const form = document.querySelector('.quiz_form');
const questionInputs = document.querySelectorAll('.questions_count')
const selectedQuestions = document.querySelectorAll('.selected_questions')

form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get question count 
    let count = 0;
    let questions = [];
    for (let index = 0; index < selectedQuestions.length; index++) {
        let id = selectedQuestions[index].value;
        let value = questionInputs[index].value;
        if (selectedQuestions[index].checked) {
            count += Number(questionInputs[index].value);
            questions.push({
                id,
                value
            })
        }
    }

    questions.push({
        "total": count
    });

    const data = {
        'title': form.title.value,
        'questions_count': count,
        'start_date': form.start_date.value,
        'start_time': form.start_time.value,
        'exp_date': form.exp_date.value,
        'exp_time': form.exp_time.value,
        'subjectId': form.subjectId.value,
        'duration': form.duration.value,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    })

    $.ajax({
        url: "/subject/" + data.subjectId + "/create-quiz",
        type: "POST",
        data: data,
        success: function (response) {
            window.location.href = "/question-bank/" + data.subjectId
        },
        error: function (response) {
            window.location.href = "/subject/" + data.subjectId + "/create-quiz"
        }
    })

});