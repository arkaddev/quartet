<?php
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.37/Tone.js"></script>
   <style>
    /* Stylizacja klawiszy pianina */
    .piano {
        display: flex;
        justify-content: space-between;
        width: 220px; /* Szerokość całego pianina */
        margin: 10px auto;
    }

    .key {
         position: relative;
        flex: 1;
       width: 100px;
        height: 80px; /* Wysokość klawisza */
        background-color: #f2f2f2;
        border: 1px solid #000;
        border-radius: 0 0 5px 5px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }
</style>

</head>
<body>
    <header>
        <h1>Tuner</h1>
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
      
      <h3 style="text-align: center;">skrzypce</h3>
      <div class="piano">
    <div class="key" data-sound="admin/sounds/g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/a.mp3"><span>A</span></div>
    <div class="key" data-sound="admin/sounds/e.mp3"><span>E</span></div>
</div>
     <h3 style="text-align: center;">altówka</h3>
      <div class="piano">
    <div class="key" data-sound="admin/sounds/c.mp3"><span>C</span></div>
    <div class="key" data-sound="admin/sounds/g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/a.mp3"><span>A</span></div>
</div>
      <h3 style="text-align: center;">wiolonczela</h3>
      <div class="piano">
   <div class="key" data-sound="admin/sounds/cello c.mp3"><span>C</span></div>
    <div class="key" data-sound="admin/sounds/cello g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/cello d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/cello a.mp3"><span>A</span></div>
</div>
      
      
      
      
      <audio id="audio"></audio>

<script>
    document.querySelectorAll('.key').forEach(key => {
        key.addEventListener('click', () => {
            const sound = new Audio(key.getAttribute('data-sound'));
            sound.play();
        });
    });
</script>
      
      
      
        </div>
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
