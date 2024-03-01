<?php

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    // Otwarcie pliku
    $file = fopen("data/data.txt", "r");
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
