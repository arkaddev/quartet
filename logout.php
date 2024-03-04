<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
</head>
<body>  
 <?php
// Wyloguj użytkownika poprzez zniszczenie sesji
session_start();
session_destroy();

// Przekieruj użytkownika na stronę logowania
header("Location: login.php");
exit;
?>
  
</body>
</html>
