<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Broken Cello Quartet</title>
  <style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}

.login-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.login-form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}
  
  </style>
</head>
<body>
  
     
      <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
      
      
      
      
      
      
      
      
      
      


    
  <?php
  
  // Rozpocznij sesję
session_start();

// Odczytaj dane z pliku JSON
$users_json = file_get_contents('data/users.json');
$users = json_decode($users_json, true);

// Sprawdź, czy dane zostały przesłane za pomocą metody POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sprawdź, czy użytkownik istnieje w danych
    foreach ($users as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
            // Ustaw zmienną sesji
          $_SESSION['zalogowany'] = true;
            $_SESSION["username"] = $username;
            // Przekieruj na stronę powitalną
            header("Location: home.php");
            exit();
        }
    }

    // Jeśli nie udało się zalogować, wyświetl komunikat
    $error = "Błędna nazwa użytkownika lub hasło.";
}
  
    /*
      
// Sprawdź, czy dane logowania zostały przesłane
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

// Hashuj hasło
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Tutaj można dodać logikę weryfikacji danych logowania
    // Na potrzeby tego przykładu sprawdzamy, czy nazwa użytkownika to "admin" i hasło to "password"
  //  if($username === 'Arek' && $password === '' || $username === 'Beata' && $password === '' || $username === 'Klaudia' && $password === '' || $username === 'Wiktoria' && $password === '') {
  
      $users = file("admin/users/u.txt", FILE_IGNORE_NEW_LINES);
       foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(':', $user);
        if ($username === $stored_username && $password === $stored_password) {
   
      
      
      session_start();
      
  echo "Zalogowano pomyślnie jako $username";
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
*/
  ?>
    
   
</body>
</html>
