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
    <title>Broken Cello app</title>
    <link rel="stylesheet" href="admin/styleadmin.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <header>
        <h1>O programie</h1>
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
       
        
         <h3>Witaj w Broken Cello app, <?php echo $username; ?>!</h3>
     
      
      
      
      
      
      <?php

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    // Otwarcie pliku
    $file = fopen("admin/data.txt", "r");
    // Inicjalizacja zmiennej na sumę minut
    $totalMinutes = 0;
    // Przejście przez każdą linię w pliku
    while (!feof($file)) {
        $line = fgets($file); // Pobranie jednej linii z pliku
        $data = explode(",", $line); // Podział linii na części po przecinku

        // Sprawdzenie czy imię na danej linii zgadza się z podanym imieniem
        if ($data[0] === $username) {
            // Dodanie liczby minut do sumy
            $totalMinutes += (int)$data[1];
        }
    }
    // Zamknięcie pliku
    fclose($file);
  $percent = ($totalMinutes / (10000 * 60)) * 100;
  $zaokraglona = round($percent, 1); // Zaokrąglenie do jednego miejsca po przecinku
    // Wyświetlenie wyniku
    echo "Jesteś mistrzem w $zaokraglona %";
}else {
    echo "Błąd: Nie udało się pobrać nazwy użytkownika.";}
      
?>

      
      
      <h3>Co nowego?</h3>
      <li>25.02.2024 Zakladka historia w panelu uzytkownika</li>
      <li>25.02.2024 Nowy formularz logowania oraz poprawione menu usera</li>
      
      
      
      
      
      <br><br>
        <img src="admin/office.png" alt="" width="350" height="350">
      <h3>Inne zmiany</h3>
   
  <li>23.02.2024 Nieaktualne wyniki podświetlane w innym kolorze</li>
      <li>22.02.2024 User panel - mozliwosc wylogowania</li>
      <li>21.02.2024 Nuty aktówki - cant help</li>
      <li>21.02.2024 Wykres - mój dzienny czas ćwiczeń</li>
      
  </div>
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
