const quizDuration = document.querySelector('.duration');
const display = document.querySelector('.countdown');


function startTimer(duration, display, timer) {
    if (!timer) {
        var timer = duration * 60,
            minutes, seconds;
    }

    let interval = setInterval(() => {

        localStorage.setItem('countdown', timer)
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        if (display) {
            display.textContent = minutes + ":" + seconds;
        }

        if (--timer < 0) {
            submitAnswers(localStorage.getItem('questions'));
            clearInterval(interval);
        }
    }, 1000);
}

let timer = localStorage.getItem('countdown');
if (timer) {
    startTimer(0, display, timer);
} else if (quizDuration) {
    const duration = quizDuration.value;
    startTimer(duration, display); // here put quiz timer
}

