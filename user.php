<?php
// Ustawienie czasu ważności sesji na 7 dni
$lifetime = 604800; // 7 dni w sekundach
session_set_cookie_params($lifetime);
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
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
  
    .link {margin: auto; /* Automatyczne wyśrodkowanie kontenera */
      
        display: block;
        margin-bottom: 5px;
        border: 1px solid black; /* węższe obramowanie */
        padding: 10px; /* mniej miejsca wokół tekstu */
        width: 300px; /* szerokość hiperłącza */
        text-decoration: none; /* wyłączenie podkreślenia */
        color: #333; /* kolor tekstu */
        font-family: Arial, sans-serif; /* wybrany font */
        font-size: 18px; /* większa czcionka */
        line-height: 15px; /* odstęp między liniami */
       text-align: center; /* tekst na środku */
      
     display: flex; /* Używamy flexbox do wyśrodkowania tekstu */
        justify-content: center; /* Wyśrodkowanie w poziomie */
        align-items: center; /* Wyśrodkowanie w pionie */
  
    }
    
    .link img {
        margin-right: 15px; /* odstęp między obrazkiem a tekstem */
        width: 20px; /* szerokość obrazka */
      height: 20px; /* wysokość obrazka */}
      
    .link:hover {
        background-color: #f0f0f0; /* zmiana koloru tła po najechaniu myszką */
    }

    
    </style>
</head>
<body>
    <header>
        <h1>Panel użytkownika</h1>
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
      
        
     
    <a href="logout.php" class="link"><img src="admin/logout.png" alt="">Wyloguj</a>
      <a href="archives.php" class="link"><img src="admin/archives.png" alt="">Historia</a>
    <a href="" class="link"><img src="admin/password.png" alt="">Zmień hasło</a>
      
  </div>
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
