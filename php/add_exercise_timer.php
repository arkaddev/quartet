<?php
// Rozpoczęcie sesji PHP
session_start();

// Pobranie imienia użytkownika z sesji lub ustawienie domyślnej wartości
$username = $_SESSION['username'] ?? 'Unknown';

if(isset($_POST['time'])) {
    $time = $_POST['time'];
 // $time = "2:30:45"; // Przykładowy czas w formacie godzina:minuta:sekunda

    // Rozdziel czas na części (godziny, minuty, sekundy)
    $parts = explode(":", $time);
    // Przekształć godziny na minuty i dodaj je do ogólnej liczby minut
    $minutes = intval($parts[0]) * 60;
    // Dodaj minuty do ogólnej liczby minut
    $minutes += intval($parts[1]);

 $t = "t";

   
  // Pobranie bieżącej daty i czasu
    $date = date('d-m-Y H:i:s');
    // Formatowanie danych
    $data = "$username, $minutes, $date, $t \n";

    // Otwarcie pliku w trybie dopisywania
    $file = fopen('data/data.txt', 'a');
    if ($file) {
        // Zapis danych do pliku
        fwrite($file, $data);
        // Zamknięcie pliku
        fclose($file);
        // Zwrócenie potwierdzenia sukcesu
        echo "Dane zostały zapisane.";
    } else {
        // Zwrócenie błędu
        http_response_code(500);
        echo "Wystąpił błąd podczas otwierania pliku.";
    }
} else {
    // Zwrócenie błędu
    http_response_code(400);
    echo "Wystąpił błąd podczas przetwarzania danych.";
}
?>
