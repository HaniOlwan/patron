const next = document.querySelector('.next_btn');

const token = document.querySelector('meta[name="_token"]').content;
const questionId = document.querySelector('.question_id').value;
const quizId = document.querySelector('.quiz_id').value;
const form = document.querySelector('.form');

next.addEventListener('click', (e) => {
    e.preventDefault();



    console.log("Heelo")

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': token
    //     },
    // })


    // $.ajax({
    //     url: '/student/quiz-page/' + quizId + '/' + questionId,
    //     type: "POST",
    //     data: {
    //         questionId
    //     },
    //     success: function (response) {
    //         if (response.status === 201) {
    //             window.location.href = '/student/quiz-page/' + quizId + '/' + response.nextQuestion['id']
    //         } else if (response.status === 400) {
    //             next.style.display = "none";
    //         }
    //         else {
    //             console.log(response)
    //         }
    //     },
    //     error: function (response) {
    //         return response;
    //     }
    // })
});