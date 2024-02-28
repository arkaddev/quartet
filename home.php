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
    <link rel="stylesheet" href="css/styleapp.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  
  @media only screen and (max-width: 600px) {
  
.container {
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    max-width: 800px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container-left {
  margin: 20px auto;
  background-color: #fff;
  padding: 10px;
  
  left: 20px; /* Przykładowa odległość od lewej strony */
  width: 80%; /* Przykładowa szerokość */
  
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

 
}


  @media only screen and (min-width: 601px) {
    
.container {
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    max-width: 800px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
    
    .news-container {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .news-title {
      font-weight: bold;
      color: #333;
    }

    .news-description {
      color: #666;
    }
    
    

.container-left {
  background-color: #fff;
  padding: 15px;
  aposition: absolute;
  position: fixed;
  left: 20px; /* Przykładowa odległość od lewej strony */
  atop: 0; /* Ustawia górną krawędź na górze okna przeglądarki */
  atop: 25%; /* Ustawia górną krawędź na połowie wysokości okna przeglądarki */
  bottom: 50px;
  height: 60%; /* Ustawia wysokość na 100% rodzica (czyli okna przeglądarki) */
  width: 250px; /* Przykładowa szerokość */
  
  border-radius: 5px;
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.5);
  font-size: 15px;
}

.inputbutton {
      width: 30px;
    }
        
.panel-info{
      color: #fff;
  }
    
    
  }
  
  
  
  
    #chat-box {
        height: 96%;
        overflow-y: scroll;
    }
  
  
  .message {
  border: 1px solid #ccc;
  padding: 5px;
  margin-bottom: 5px;
  background-color: #FFE4E1;
     border-radius: 5px;
    
}
 
  
  
  
  
</style>
</head>
<body>
    <header>
        
    </header>
     <nav>
       <h3 class="panel-info">Home</h3>
    
       <a href="home.php" class="image-link"><img src="images/menu/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="images/menu/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="images/menu/user.png" alt=""></a>
    </nav>
  
    <div class="container">   

    <div class="news-container">
      <h2 class="news-title">Co nowego?</h2>
      <p class="news-description">
      
       <li>27.02.2024 Poprawiony uklad graficzny dla czatu</li>
      <li>25.02.2024 Czat</li>
      <li>25.02.2024 Zakladka historia w panelu uzytkownika</li>
      <li>25.02.2024 Nowy formularz logowania oraz poprawione menu usera</li>
      <li>23.02.2024 Nieaktualne wyniki podświetlane w innym kolorze</li>
      <li>22.02.2024 User panel - mozliwosc wylogowania</li>
      <li>21.02.2024 Nuty aktówki - cant help</li>
      <li>21.02.2024 Wykres - mój dzienny czas ćwiczeń</li>
      
      </p>
    </div>
    
    
    <h3>Witaj w Broken Cello app, <?php echo $username; ?>!</h3>
     
      
      
      <?php

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    // Otwarcie pliku
    $file = fopen("data/data.txt", "r");
    // Inicjalizacja zmiennej na sumę minut
    $totalMinutes = 0;
    // Przejście przez każdą linię w pliku
    while (!feof($file)) {
        $line = fgets($file); // Pobranie jednej linii z pliku
        $data = explode(",", $line); // Podział linii na części po przecinku

        // Sprawdzenie czy imię na danej linii zgadza się z podanym imieniem
        if ($data[0] === $username) {
            // Dodanie liczby minut do sumy
            $totalMinutes += (int)$data[1];
        }
    }
    // Zamknięcie pliku
    fclose($file);
  $percent = ($totalMinutes / (10000 * 60)) * 100;
  $zaokraglona = round($percent, 1); // Zaokrąglenie do jednego miejsca po przecinku
    // Wyświetlenie wyniku
    echo "Jesteś mistrzem w $zaokraglona %";
}else {
    echo "Błąd: Nie udało się pobrać nazwy użytkownika.";}
      
?>
  </div>
  
  
  
  
  
  <div class="container-left">
    <div id="chat-box"></div>
    <input type="text" id="message" class="inputchat" placeholder="Wpisz wiadomość">
    <button onclick="sendMessage()" class="inputbutton">OK</button>

    <script src="js/chat.js"></script>
  </div>
  

    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
