<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Broken Cello Quartet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>The Broken Cello Quartet</h1>
    </header>
    <nav>
        <a href="#about">O zespole</a>
        <a href="#music">Muzyka</a>
        <a href="#contact">Kontakt</a>
        <a href="admin.php">Zaloguj</a>
    </nav>
    <div class="container">
   
      <h2>Logowanie</h2>
    <form action="login.php" method="post">
        <label for="username">Nazwa użytkownika:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Zaloguj</button>
    </form>
      
      
      
    
  <?php
      
      session_start();
      
// Sprawdź, czy dane logowania zostały przesłane
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tutaj można dodać logikę weryfikacji danych logowania
    // Na potrzeby tego przykładu sprawdzamy, czy nazwa użytkownika to "admin" i hasło to "password"
    if($username === 'Arek' && $password === 'arek1' || $username === 'Beata' && $password === 'violavioletka1!' || $username === 'Klaudia' && $password === 'Skunks' || $username === 'Wiktoria' && $password === 'SmyczekWi') {
        echo "Zalogowano pomyślnie jako $username";
      // Jeśli dane logowania są poprawne, ustaw zmienną sesyjną zalogowany na true
        $_SESSION['zalogowany'] = true;
       // Ustaw zmienną sesyjną z nazwą użytkownika
        $_SESSION['username'] = $username;
      // Jeśli dane logowania są poprawne, przekieruj użytkownika na stronę admin.php
        header("Location: admin.php");
        exit(); // Upewnij się, że zakończysz działanie skryptu po przekierowaniu
    
    } else {
        echo "Błąd logowania. Sprawdź nazwę użytkownika i hasło.";
    }
}
?>
</div>
  
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
</body>
</html>
