<?php
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>admin panel</h1>
    </header>
    <nav>
       <a href="admin.php">Start</a>
      <a href="addexercise.php">Dodaj wpis</a>
      <a href="statistics.php">Statystyki</a>
    </nav>
    <div class="container">
       
      <body>
        
    <?php
    $file = fopen('admin/data.txt', 'r'); // Otwórz plik do odczytu

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(', ', $line); // Podziel linię na imię i liczbę
            echo "<p><strong>$data[0]</strong> ćwiczył <strong>$data[1]</strong> minut w dniu $data[2]</p>";
        }
        fclose($file); // Zamknij plik
    } else {
        echo "Błąd: Nie można otworzyć pliku.";
    }
    ?>

        
        
      <h2>Statystyki</h2>
   
<?php
    $filename = 'admin/data.txt';
    
    if (file_exists($filename)) {
        $lines = file($filename);
        $sums = array();
        
        // Oblicz sumy dla każdego użytkownika
        foreach ($lines as $line) {
            // Podziel linię na imię, liczbę i datę
            list($name, $number, $date) = explode(', ', $line);
            
            // Usunięcie białych znaków z imienia
            $name = trim($name);
            
            // Dodaj liczbę do sumy dla danego użytkownika
            if (isset($sums[$name])) {
                $sums[$name] += intval(trim($number));
            } else {
                $sums[$name] = intval(trim($number));
            }
        }
        
        // Wyświetlanie sum dla każdego użytkownika
        echo "<ul>";
        foreach ($sums as $name => $sum) {
            echo "<li>$name ćwiczył razem: $sum</li>";
        }
        echo "</ul>";
    } else {
        echo "Plik $filename nie istnieje.";
    }
    ?>
  
</body>
</html>
