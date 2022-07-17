const token = document.querySelector('meta[name="_token"]').content;
const form = document.querySelector('.quiz_form');
const questionInputs = document.querySelectorAll('.questions_count');
const selectedQuestions = document.querySelectorAll('.selected_questions');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get question count 
    let count = 0;
    let questions = [];
    for (let index = 0; index < selectedQuestions.length; index++) {
        let topicId = selectedQuestions[index].value;
        let value = questionInputs[index].value;
        if (selectedQuestions[index].checked) {
            count += Number(questionInputs[index].value);
            questions.push({
                topicId,
                value
            })
        }
    }
    const data = {
        'title': form.title.value,
        'questions': questions,
        'start_date': form.start_date.value,
        'start_time': form.start_time.value,
        'exp_date': form.exp_date.value,
        'exp_time': form.exp_time.value,
        'duration': form.duration.value,
        'mark': count,
        'subjectId': form.subjectId.value,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    })

    $.ajax({
        url: "/quiz/" + data.subjectId + "/" + "create-quiz",
        type: "POST",
        data: data,
        success: function (response) {
            if (response.status === 201) {
                window.location.href = "/question-bank/" + data.subjectId;
            } else {
                console.log(response)
                // alert("Please fill out all inputs")
            }
        },
        error: function (response) {
            return response;
        }
    })

});