let dropButton = document.querySelectorAll('.drop');

dropButton.forEach((ele) => ele.addEventListener('click', (e) => {
    e.preventDefault();
    let subjectId = e.target.getAttribute('subject-id');
    if (confirm("Are you sure you want to drop", "")) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            },
        });
        $.ajax({
            url: '/student/drop-subject/' + subjectId,
            type: 'GET',
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
    } else {
        // Do something 
    }


}
))