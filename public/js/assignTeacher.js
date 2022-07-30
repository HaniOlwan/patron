let token = document.querySelector('meta[name="_token"]').content;
let joinButtons = document.querySelectorAll('.join');

joinButtons.forEach((ele) => ele.addEventListener('click', (e) => {
    e.preventDefault();
    let subjectId = e.target.getAttribute('subject-id');
    let teacherId = e.target.getAttribute('teacher-id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '/admin/assign-teachers/' + subjectId,
        type: 'POST',
        data: {
            teacherId
        },
        success: function (response) {
            if (response.status === 400) {
                alertMsg.textContent = response.message;
            } else {
                window.location.reload();
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}
))