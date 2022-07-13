const duration = document.querySelector('.duration').value;
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
            submitAnswers();
        }
    }, 1000);
}

startTimer(localStorage.getItem('countdown') ?? duration * 60, display); // here put quiz timer


