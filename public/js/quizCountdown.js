const duration = document.querySelector('.duration').value;
const token = document.querySelector('meta[name="_token"]').content;
const subjectId = document.querySelector('.subject_id').value;
const display = document.querySelector('.countdown');

function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    setInterval(() => {
        localStorage.setItem('countdown', timer)
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                },
            });
            $.ajax({
                url: '/student/end-quiz',
                type: 'POST',
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
    }, 1000);
}

startTimer(localStorage.getItem('countdown') ?? duration * 60, display); // here put quiz timer
