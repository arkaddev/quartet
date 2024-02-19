<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Broken Cello Quartet</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <header>
        <h1>admin panel</h1>
    </header>
    <nav>
        <a href="admin.php">Metronom</a>
    </nav>
    <div class="container">
       
      <body>
    <h1>Metronom</h1>
    
         <button onclick="startMetronome(70)">Start (70 BPM)</button>
        <button onclick="startMetronome(75)">Start (75 BPM)</button>
         <button onclick="startMetronome(80)">Start (80 BPM)</button>
        <button onclick="startMetronome(85)">Start (85 BPM)</button>
    <button onclick="startMetronome(100)">Start (100 BPM)</button>
    <button onclick="stopMetronome()">Stop</button>
         <h1></h1>
      <br>
        
        <button onclick="startMetronome(70)">Start (Nearer My God to thee - 70 BPM)</button>
        <button onclick="stopMetronome()">Stop</button><br>
        
        <button onclick="startMetronome(70)">Start (Cant help - 70 BPM)</button>
        <button onclick="stopMetronome()">Stop</button><br>
        
        <button onclick="startMetronome(85)">Start (Wedding march Wagner - 85 BPM)</button>
        <button onclick="stopMetronome()">Stop</button><br>
        
          <button onclick="startMetronome(105)">Start (Hungarian dance - 105 BPM)</button>
        <button onclick="stopMetronome()">Stop</button><br>
        
        

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
