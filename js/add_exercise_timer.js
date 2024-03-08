      // Funkcja formatująca czas w formacie HH:MM:SS
function formatTime(hours, minutes, seconds) {
    return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

// Funkcja pobierająca przechowywany czas z local storage
function getStoredTime() {
    const storedTime = localStorage.getItem('stopwatchTime');
    return storedTime ? JSON.parse(storedTime) : { hours: 0, minutes: 0, seconds: 0 };
}

// Funkcja zapisująca aktualny czas do local storage
function saveTime(hours, minutes, seconds) {
    localStorage.setItem('stopwatchTime', JSON.stringify({ hours, minutes, seconds }));
}

let timerInterval;
let hours = 0;
let minutes = 0;
let seconds = 0;

// Funkcja aktualizująca stoper
function updateTimer() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    document.getElementById('timer').innerText = formatTime(hours, minutes, seconds);
    saveTime(hours, minutes, seconds);
}

// Funkcja startująca lub zatrzymująca stoper
function startStopTimer() {
    if (!timerInterval) {
        timerInterval = setInterval(updateTimer, 1000);
        document.getElementById('startStopButton').innerText = 'Stop';
    } else {
        clearInterval(timerInterval);
        timerInterval = null;
        document.getElementById('startStopButton').innerText = 'Start';
    }
}

// Funkcja resetująca stoper
function resetTimer() {
    clearInterval(timerInterval);
    timerInterval = null;
    hours = minutes = seconds = 0;
    document.getElementById('timer').innerText = '00:00:00';
    saveTime(hours, minutes, seconds);
    document.getElementById('startStopButton').innerText = 'Start';
}

// Funkcja zapisująca dane za pomocą PHP
function saveData() {
    $.ajax({
        type: 'POST',
        url: 'php/add_exercise_timer.php',
        data: {
            //username: '<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "" ?>',
            time: formatTime(hours, minutes, seconds),
            //date: new Date().toISOString()
        },
        success: function(response) {
            alert('Dane zostały zapisane.');
          window.location.href ="statistics.php";
        },
        error: function(xhr, status, error) {
            alert('Wystąpił błąd podczas zapisywania danych.');
        }
    });
  resetTimer();
}

// Po załadowaniu strony
document.addEventListener('DOMContentLoaded', function() {
    const storedTime = getStoredTime();
    hours = storedTime.hours;
    minutes = storedTime.minutes;
    seconds = storedTime.seconds;
    document.getElementById('timer').innerText = formatTime(hours, minutes, seconds);

    // Dodanie obsługi zdarzeń do przycisków
    document.getElementById('startStopButton').addEventListener('click', startStopTimer);
    document.getElementById('resetButton').addEventListener('click', resetTimer);
    document.getElementById('saveButton').addEventListener('click', saveData);
});
