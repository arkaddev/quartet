<?php
// Wczytanie zawartości pliku JSON
$jsonData = file_get_contents('data/users.json');

// Dekodowanie danych JSON do tablicy asocjacyjnej
$usersData = json_decode($jsonData, true);

// Sprawdzenie, czy udało się poprawnie zdekodować dane JSON
if ($usersData !== null) {
  
  // Definicja funkcji do sortowania użytkowników alfabetycznie
function compareUsers($a, $b) {
    return strcmp($a['username'], $b['username']);
}

// Sortowanie użytkowników alfabetycznie
usort($usersData, 'compareUsers');

  
  
  
    // Wyświetlenie nagłówków tabeli
    echo "<table><tr><th>Username</th><th>Status</th></tr>";
  
    // Przejście przez wszystkich użytkowników
    foreach ($usersData as $user) {
      if($user['group']===$group){
        $username = $user['username'];
        // Określenie statusu online/offline na podstawie ostatniej aktywności
        $lastActiveTime = strtotime($user['last_active']);
        $currentTime = time();
        $onlineThreshold = 600; // 10 minut - załóżmy, że to czas bezczynności po którym użytkownik zostaje uznany za offline
        //$isOnline = ($currentTime - $lastActiveTime) <= $onlineThreshold;
        //$onlineStatus = $isOnline ? "Online" : "Offline";
        //echo "<tr><td>$username</td><td>$onlineStatus</td></tr>";
        /*
        
        $timeSinceLastActivity = $currentTime - $lastActiveTime;

        if ($timeSinceLastActivity <= $onlineThreshold) {
            $onlineStatus = "Online";
            $timeAgo = "";
        } else {
            $onlineStatus = "Offline";
            $minutesAgo = floor($timeSinceLastActivity / 60); // Convert seconds to minutes
            $timeAgo = "$minutesAgo minute(s) ago";
        }

        echo "<tr><td>$username</td><td>$onlineStatus</td><td>$timeAgo</td></tr>";
  */
         $timeSinceLastActivity = $currentTime - $lastActiveTime;
        if ($timeSinceLastActivity <= $onlineThreshold) {
            $onlineStatus = "Online";
            $timeAgo = "";
        } else {
            $hoursAgo = floor($timeSinceLastActivity / 3600); // Convert seconds to hours
            if ($hoursAgo >= 1) {
                $timeAgo = "$hoursAgo hour(s) ago";
            } else {
                $minutesAgo = floor($timeSinceLastActivity / 60); // Convert seconds to minutes
                $timeAgo = "$minutesAgo minute(s) ago";
            }
            $onlineStatus = "Offline";
        }

        echo "<tr><td>$username</td><td>$onlineStatus</td><td>$timeAgo</td></tr>";
   
        
        
      }
      }

    // Zamknięcie tabeli
    echo "</table>";
} else {
    echo "Błąd podczas dekodowania danych JSON.";
}
?>
