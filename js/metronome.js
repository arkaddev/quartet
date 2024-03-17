        let timer;
        let tempo = 120; // Default tempo in BPM (beats per minute)
        let playing = false;
        let interval = 60000 / tempo; // Initial interval

        function playClick() {
            const click = new Audio('audio/metronome/t.mp3');
            click.play();
        }

        function startStop() {
            if (!playing) {
                playing = true;
                startMetronome();
                document.getElementById('startStopMetronomeButton').innerText = 'Stop';
            } else {
                playing = false;
                clearInterval(timer);
                document.getElementById('startStopMetronomeButton').innerText = 'Start';
            }
        }

        function startMetronome() {
            timer = setInterval(playClick, interval);
        }

        function changeTempo(newTempo) {
            tempo = newTempo;
            interval = 60000 / tempo;
            if (playing) {
                clearInterval(timer);
                startMetronome();
            }
            document.getElementById('tempoInput').value = tempo; // Update tempo input field
        }

        document.getElementById('startStopMetronomeButton').addEventListener('click', startStop);
        document.getElementById('tempoInput').addEventListener('change', function() {
            tempo = parseInt(this.value);
            interval = 60000 / tempo;
            if (playing) {
                clearInterval(timer);
                startMetronome();
            }
        });

        document.getElementById('tempo60Button').addEventListener('click', function() {
            changeTempo(60);
        });

        document.getElementById('tempo80Button').addEventListener('click', function() {
            changeTempo(80);
        });

        document.getElementById('tempo100Button').addEventListener('click', function() {
            changeTempo(100);
        });

document.getElementById('tempo120Button').addEventListener('click', function() {
            changeTempo(120);
        });
document.getElementById('tempo140Button').addEventListener('click', function() {
            changeTempo(140);
        });
