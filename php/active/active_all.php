<?php
// Wczytanie zawartości pliku JSON
$jsonData = file_get_contents('data/users.json');

// Dekodowanie danych JSON do tablicy asocjacyjnej
$usersData = json_decode($jsonData, true);

// Sprawdzenie, czy udało się poprawnie zdekodować dane JSON
if ($usersData !== null) {
    // Wyświetlenie nagłówków tabeli
    echo "<table><tr><th>Username</th><th>Status</th></tr>";

    // Przejście przez wszystkich użytkowników
    foreach ($usersData as $user) {
        $username = $user['username'];
        // Określenie statusu online/offline na podstawie ostatniej aktywności
        $lastActiveTime = strtotime($user['last_active']);
        $currentTime = time();
        $onlineThreshold = 600; // 10 minut - załóżmy, że to czas bezczynności po którym użytkownik zostaje uznany za offline
        $isOnline = ($currentTime - $lastActiveTime) <= $onlineThreshold;
        $onlineStatus = $isOnline ? "Online" : "Offline";
        echo "<tr><td>$username</td><td>$onlineStatus</td></tr>";
    }

    // Zamknięcie tabeli
    echo "</table>";
} else {
    echo "Błąd podczas dekodowania danych JSON.";
}
?>
