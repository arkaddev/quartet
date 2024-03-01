<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="stylesheet" href="css/styleapp.css?v=1.0">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  
   <div class="container-right">
     <?php include 'php/statistic/master.php'; ?>
     <br><br>
     <?php include 'php/statistic/points_general.php'; ?>
   </div>
  
   <div class="container-left">
   <div id="chat-box"></div>
   <input type="text" id="message" class="inputchat" placeholder="Wpisz wiadomość">
   <button onclick="sendMessage()" class="inputbutton">OK</button>

    <script src="js/chat.js"></script>
   </div>
  
     
    
    <div class="container">  
      
      
   
      
      
      
    <div class="news-container">
      <h2 class="news-title">Co nowego?</h2>
      <p class="news-description">
      
      <li>29.02.2024 Stoper przy zapisywaniu cwiczen</li>
      <li>28.02.2024 Dodana punktacja</li>
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
  </div>
  

    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
