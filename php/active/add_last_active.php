<?php
// Wczytanie istniejących danych JSON
$jsonData = file_get_contents('data/users.json');

// Dekodowanie danych JSON do tablicy asocjacyjnej
$usersData = json_decode($jsonData, true);

// Sprawdzenie, czy udało się poprawnie zdekodować dane JSON
if ($usersData !== null) {
    // Pobranie aktualnego ID użytkownika (możesz to dostosować do swoich potrzeb)
    $userId = $id;
  
    // Aktualizacja danych o aktywności dla użytkownika o danym ID
    foreach ($usersData as &$user) {
        if ($user['id'] == $userId) {
            $user['last_active'] = date('Y-m-d H:i:s'); // Ustawienie aktualnego czasu jako czasu ostatniej aktywności
            break;
        }
    }

    // Zapisanie zaktualizowanych danych z powrotem do pliku JSON
    $jsonUpdatedData = json_encode($usersData, JSON_PRETTY_PRINT);
    file_put_contents('data/users.json', $jsonUpdatedData);

    //echo "Dane o ostatniej aktywności zostały zaktualizowane pomyślnie.";
} else {
    //echo "Błąd podczas dekodowania danych JSON.";
}
?>
