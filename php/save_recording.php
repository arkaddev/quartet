<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audio_data"])) {
    $upload_dir = '../audio/uploads/'; // Katalog, w którym będą przechowywane nagrania
    $audio_data = $_FILES["audio_data"];
    $audio_name = $audio_data["name"];
    $audio_tmp_name = $audio_data["tmp_name"];
    $target_file = $upload_dir . basename($audio_name);

    if (move_uploaded_file($audio_tmp_name, $target_file)) {
        echo $target_file; // Zwraca ścieżkę do zapisanego pliku
    } else {
        echo "Błąd podczas zapisywania pliku.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
