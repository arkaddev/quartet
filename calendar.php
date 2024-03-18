<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello</title>
    <link rel="stylesheet" href="css/styleapp.css?v=1.26">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.37/Tone.js"></script>
   <style>
    
</style>

</head>
<body>
    <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link"><img src="images/menu/home.png" alt=""></a>
      <a href="calendar.php" class="image-link active"><img src="images/menu/calendar.png" alt=""></a>
        
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="songs.php" class="image-link"><img src="images/menu/songs.png" alt=""></a>
      <a href="recordings.php" class="image-link"><img src="images/menu/microphone.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="images/menu/chart.png" alt=""></a>
       
    </div>
    <div class="right-item">
      <a href="#" id="messageMenu" class="image-link"><img src="images/menu/message.png" alt=""></a>
        <a href="#" class="image-link" id="menu-button"><img src="images/menu/user.png" alt=""></a>
      <div class="submenu" id="submenu">
            <a href="#">Ustawienia</a>
            <a href="#">Historia</a>
            <a href="logout.php">Wyloguj</a>
        </div>
    </div>
</div>
  
  <script>
    
    document.addEventListener("DOMContentLoaded", function() {
    var menuButton = document.getElementById("menu-button");
    var submenu = document.getElementById("submenu");

    menuButton.addEventListener("click", function() {
        if (submenu.style.display === "none") {
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    });
});
    
    
</script>
  
  
  
   <div id="chatContainer" class="chat-container" style="display: none;">
    <div id="minimalization">&#x2014;</div>
    <div id="chat-box"></div>
      
      <div class="chat-input-button">
        <input type="text" id="message" class="chat-input" placeholder="Wpisz wiadomość">
        <button onclick="sendMessage()" class="chat-button">OK</button>
      </div>
    
  </div>
  
  <!-- Wartość zmiennej PHP przekazana do atrybutu data -->
    <div id="data" data-username="<?php echo htmlspecialchars($username); ?>"></div>

  <script src="js/chat.js"></script>
 
  <script>
    // Pobranie przycisku minimalizacji
    var minimalizationButton = document.getElementById('minimalization');

    // Pobranie zawartości okna
    var windowContent = document.getElementById('chatContainer');

    // Dodanie obsługi zdarzenia kliknięcia na przycisk minimalizacji
    minimalizationButton.addEventListener('click', function() {
        // Minimalizacja okna
        windowContent.style.display = windowContent.style.display === 'none' ? 'block' : 'none';
    })
    
   var messageButton = document.getElementById('messageMenu');
    messageButton.addEventListener('click', function() {
       
    windowContent.style.display = windowContent.style.display === 'none' ? 'block' : 'none';
    }) 
    ;
</script>
  
  
  <div class="main-container">
  
     <div class="right-container">
    
   </div>
  
   <div class="left-container">
    
  
   </div>

    
    <div class="middle-container">  
      
      <h3>Marzec 2024</h3>
      <li>14.03.2024 - 1 próba kwartetu</li>
      
      <h3>Luty 2024</h3>
      <li>07.02.2024 - założenie kwartetu smyczkowego</li>
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>
      
  
  

      
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
