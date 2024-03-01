   <?php
if(isset($_POST['numberInput'])) {
    $name =  $username;
    $number = $_POST['numberInput'];
  $date = date('d-m-Y H:i:s'); // Pobranie aktualnej daty w formacie RRRR-MM-DD GG:MM:SS
  //$device = $_SERVER['HTTP_USER_AGENT']; // Pobranie informacji o urządzeniu

    $data = "$name, $number, $date\n"; // Format danych: imię, liczba

    $file = fopen('data/data.txt', 'a'); // Otwarcie pliku w trybie dodawania do istniejącej zawartości
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
