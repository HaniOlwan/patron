const token = document.querySelector('meta[name="_token"]').content;
const form = document.querySelector('.topic_form');
const questionInputs = document.querySelectorAll('.questions_count')
const selectedQuestions = document.querySelectorAll('.selected_questions')

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const quizId = form.quizId.value;
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    })

    $.ajax({
        url: "/quiz/" + quizId + "/select-topic",
        type: "POST",

        data: { "data": questions },

        success: function (response) {
            if (response.status === 201) {
                window.location.href = "/quiz/" + quizId + " /edit-quiz"
            } else if (response.status === 400) {
                alert("Please fill out number inputs")
            }
        },
        error: function (response) {
            return response;
        }
    })

});