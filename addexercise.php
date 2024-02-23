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
</head>
<body>
    <header>
        <h1>Dodaj ćwiczenie</h1>
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
       
    
    
      
        <p><span style="color: red;">Pamiętaj aby dane wpisywać zgodnie z prawdą, ponieważ tylko wtedy ta strona ma sens. Nie będzie żadnych konsekwencji jeżeli zajmiesz ostatnie miejsce na liście. Pomyśl o tym że prawda zawsze wyjdzie na jaw, ponieważ im wiecej czasu poświęcasz na ćwiczenie, tym większy robisz postęp.</span></p>

   
      <h2>Zapis czasu ćwiczeń</h2>
    <form action="" method="post">
      <label for="numberInput">Czas w min:</label>
        <input type="text" id="numberInput" name="numberInput" required><br><br>
        <button type="submit" name="redirect">Wyślij</button>
    </form>

      
      
        <?php
if(isset($_POST['numberInput'])) {
    $name =  $username;
    $number = $_POST['numberInput'];
  $date = date('d-m-Y H:i:s'); // Pobranie aktualnej daty w formacie RRRR-MM-DD GG:MM:SS
  //$device = $_SERVER['HTTP_USER_AGENT']; // Pobranie informacji o urządzeniu

    $data = "$name, $number, $date\n"; // Format danych: imię, liczba

    $file = fopen('admin/data.txt', 'a'); // Otwarcie pliku w trybie dodawania do istniejącej zawartości
    fwrite($file, $data); // Zapis danych do pliku
    fclose($file); // Zamknięcie pliku

    echo "Dane zostały zapisane pomyślnie!";
}
        
         if(isset($_POST['redirect'])) {
        // Wykonaj przekierowanie na inną stronę
        header("Location: statistics.php");
        exit(); // Upewnij się, że żadne inne treści nie zostaną wysłane po nagłówku przekierowania
    }
?>

        </div>
      
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
 
</body>
</html>
