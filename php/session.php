<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();

//session_set_cookie_params(86400);

/*
// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: login.php");
    exit();
}
*/


// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Odczytaj nazwę użytkownika z sesji
$username = $_SESSION['username'];
$instrument = $_SESSION["instrument"];
?>
