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
        <a href="login.php">Zaloguj</a>
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
    
      
// Sprawdź, czy dane logowania zostały przesłane
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

// Hashuj hasło
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Tutaj można dodać logikę weryfikacji danych logowania
    // Na potrzeby tego przykładu sprawdzamy, czy nazwa użytkownika to "admin" i hasło to "password"
  //  if($username === 'Arek' && $password === '' || $username === 'Beata' && $password === '' || $username === 'Klaudia' && $password === '' || $username === 'Wiktoria' && $password === '') {
  
      $users = file("admin/u.txt", FILE_IGNORE_NEW_LINES);
       foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(':', $user);
        if ($username === $stored_username && $password === $stored_password) {
   
      
      
      
      
  echo "Zalogowano pomyślnie jako $username";
      
      session_start();
      // Jeśli dane logowania są poprawne, ustaw zmienną sesyjną zalogowany na true
        $_SESSION['zalogowany'] = true;
       // Ustaw zmienną sesyjną z nazwą użytkownika
        $_SESSION['username'] = $username;
          
      // Jeśli dane logowania są poprawne, przekieruj użytkownika na stronę admin.php
        header("Location: home.php");
        exit(); // Upewnij się, że zakończysz działanie skryptu po przekierowaniu
    
    } else {
        echo "Błąd logowania. Sprawdź nazwę użytkownika i hasło.";
    }
}}
?>
    
      
      
</div>
  
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
</body>
</html>
