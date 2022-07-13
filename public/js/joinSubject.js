let token = document.querySelector('meta[name="_token"]').content;
let joinButtons = document.querySelectorAll('.join');
let alertMsg = document.querySelector('.display_text');
subjectCode = "";

joinButtons.forEach((ele) => ele.addEventListener('click', (e) => {
    e.preventDefault();
    let subjectId = e.target.getAttribute('subject-id');
    let subjectStatus = e.target.getAttribute('data-status');
    if (subjectStatus == 1) {
        subjectCode = prompt("Enter subject code", "");
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        },
    });
    $.ajax({
        url: '/student/join-subject/' + subjectId,
        type: 'POST',
        data: {
            code: subjectCode,
            status: subjectStatus == 1 ? "private" : 'public'
        },
        success: function (response) {
            if (response.status === 400) {
                alertMsg.textContent = response.message;
            } else {
                window.location.href = "/student/view-subject/" + subjectId;
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}
))