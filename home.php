<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();

//session_set_cookie_params(86400);
// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: login.php");
    exit();
}

// Odczytaj nazwę użytkownika z sesji
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="stylesheet" href="admin/styleadmin.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #chat-box {
        height: 300px;
        overflow-y: scroll;
    }
</style>
</head>
<body>
    <header>
        <h1>Broken Cello app</h1>
    </header>
     <nav>
       <a href="home.php" class="image-link"><img src="admin/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="admin/user.png" alt=""></a>
    </nav>
    <div class="container">
       
             
      <div id="chat-box"></div>
<input type="text" id="message" placeholder="Wpisz wiadomość">
<button onclick="sendMessage()">Wyślij</button>

<script>
function sendMessage() {
   
  var username = "<?php echo $username; ?>";
    var message = document.getElementById("message").value;
    message = username +": "+ message;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").value = "";
        }
    };
    xmlhttp.open("GET", "send_message.php?message=" + message, true);
    xmlhttp.send();
}

function fetchMessages() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat-box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "fetch_messages.php", true);
    xmlhttp.send();
}

setInterval(fetchMessages, 1000); // Pobierz wiadomości co sekundę
</script>
  
      
      
      
      
      
       
      
      
      
  
  </div>
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
