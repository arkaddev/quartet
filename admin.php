\<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.html");
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
</head>
<body>
    <header>
        <h1>admin panel</h1>
    </header>
    <nav>
        <a href="admin.php">Metronom</a>
      <a href="dziennik.php">Dziennik</a>
      <a href="stats.php">Statystyki</a>
      
    </nav>
    <div class="container">
       
      <body>
        
         <h1>Witaj na stronie zalogowanego użytkownika, <?php echo $username; ?>!</h1>
    <h1>Metronom</h1>
    
         <button onclick="startMetronome(70)">Start (70 BPM)</button>
        <button onclick="startMetronome(75)">Start (75 BPM)</button>
         <button onclick="startMetronome(80)">Start (80 BPM)</button>
        <button onclick="startMetronome(85)">Start (85 BPM)</button>
    <button onclick="startMetronome(100)">Start (100 BPM)</button>
    <button onclick="stopMetronome()">Stop</button>
         <h1></h1>
      <br>
        
        <h1>Utwory</h1>
        
        <button onclick="startMetronome(70)">Start (Nearer My God to thee - 70 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio1')">s1</button>
        <button disabled onclick="playSound('audio2')">s1</button>
        <button disabled onclick="playSound('audio3')">a</button>
        <button disabled onclick="playSound('audio4')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="startMetronome(70)">Start (Cant help - 70 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio5')">s1</button>
        <button disabled onclick="playSound('audio6')">s1</button>
        <button disabled onclick="playSound('audio7')">a</button>
        <button disabled onclick="playSound('audio8')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="startMetronome(85)">Start (Wedding march Wagner - 85 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio9')">s1</button>
        <button disabled onclick="playSound('audio10')">s1</button>
        <button onclick="playSound('audio11')">a</button>
        <button disabled onclick="playSound('audio12')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="startMetronome(105)">Start (Hungarian dance - 105 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio13')">s1</button>
        <button disabled onclick="playSound('audio14')">s1</button>
        <button disabled onclick="playSound('audio15')">a</button>
        <button disabled onclick="playSound('audio16')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        
    <audio id="audio11" src="admin/altowka wagner.mp3"></audio>
  

    <script>
        function playSound(audioId) {
            var audio = document.getElementById(audioId);
            audio.play();
        }
    </script>
        

    <script>
        let intervalID;

        function startMetronome(tempo) {
            let interval = 60000 / tempo; // Obliczenie czasu interwału w milisekundach
            intervalID = setInterval(playTick, interval);
        }

        function stopMetronome() {
            clearInterval(intervalID);
        }

        function playTick() {
            let audio = new Audio('admin/t.mp3'); // Załaduj dźwięk metronomu (plik wav)
            audio.play();
        }
    </script>
        </div>
      
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>

