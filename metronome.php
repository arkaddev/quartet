<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();


// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: login.php");
    exit();
}

// Odczytaj nazwę użytkownika z sesji
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="admin/styleadmin.css">
  <style>
        
        #metronome {
            text-align: center;
            margin-top: 20px;
        }

        .inputstart{
            font-size: 16px;
            padding: 8px 16px;
          border-radius: 10px;
        }

        .buttonstart {
            cursor: pointer;
         padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }
   
    
        
      button:hover {
            background-color: #0056b3;
        }
        
    .buttontempo {
            font-size: 10px;
            padding: 8px 16px;
            margin: 0 10px;
      cursor: pointer;
         padding: 10px 20px;
           
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }
   
    
    </style>
</head>
<body>
    <header>
        <h1>Metronom</h1>
    </header>
     <nav>
       <a href="home.php" class="image-link"><img src="admin/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="admin/user.png" alt=""></a>
    </nav>
    <div class="container">
       
      
    <div id="metronome">
        <input type="number" id="tempoInput" class="inputstart" placeholder="Tempo (BPM)" value="120">
      <button id="startStopButton" class="buttonstart">Start</button><br><br>
        <button id="tempo60Button" class="buttontempo">60 BPM</button>
        <button id="tempo80Button" class="buttontempo">80 BPM</button>
        <button id="tempo100Button" class="buttontempo">100 BPM</button>
    </div>

    <script>
        let timer;
        let tempo = 120; // Default tempo in BPM (beats per minute)
        let playing = false;
        let interval = 60000 / tempo; // Initial interval

        function playClick() {
            const click = new Audio('admin/t.mp3'); // Provide your click sound file
            click.play();
        }

        function startStop() {
            if (!playing) {
                playing = true;
                startMetronome();
                document.getElementById('startStopButton').innerText = 'Stop';
            } else {
                playing = false;
                clearInterval(timer);
                document.getElementById('startStopButton').innerText = 'Start';
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

        document.getElementById('startStopButton').addEventListener('click', startStop);
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
    </script>
      
      
  
        </div>
      
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
