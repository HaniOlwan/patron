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
        'questions_count': count,
        'questions': questions,
        'start_date': form.start_date.value,
        'start_time': form.start_time.value,
        'exp_date': form.exp_date.value,
        'exp_time': form.exp_time.value,
        'quizId': form.quizId.value,
        'duration': form.duration.value,
    }
    console.log(data)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    })

    $.ajax({
        url: "/quiz/" + data.quizId + "/" + "edit-quiz",
        type: "PATCH",
        data: data,
        success: function (response) {
            if (response.status === 201) {
                console.log("Success")
                console.log(response)
                // history.go(-2);
            } else {
                console.log("Error")
                console.log(response)

                // alert("Please fill out all inputs")
            }
        },
        error: function (response) {
            return response;
        }
    })

});