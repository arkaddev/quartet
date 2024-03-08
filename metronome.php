<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello</title>
   <link rel="stylesheet" href="css/styleapp.css?v=1.26">
  <style>
        
        #metronome {
            text-align: center;
            margin-top: 20px;
        }

        .inputstart{
            font-size: 16px;
            padding: 8px 16px;
          border-radius: 10px;
        }

        .buttonstart {
            cursor: pointer;
         padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }
   
    
        
      button:hover {
            background-color: #0056b3;
        }
        
    .buttontempo {
            font-size: 10px;
            padding: 8px 16px;
            margin: 0 10px;
      cursor: pointer;
         padding: 10px 20px;
           
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }
   
    
    
    
    

    
    
    
    </style>
</head>
<body>
  <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link"><img src="images/menu/home.png" alt=""></a>
        
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link active"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="songs.php" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="images/menu/chart.png" alt=""></a>
       
    </div>
    <div class="right-item">
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
  
  
  
     <div id="window" class="chat-container">
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
    var windowContent = document.getElementById('window');

    // Dodanie obsługi zdarzenia kliknięcia na przycisk minimalizacji
    minimalizationButton.addEventListener('click', function() {
        // Minimalizacja okna
        windowContent.style.display = windowContent.style.display === 'none' ? 'block' : 'none';
    });
</script>
  
  
  <div class="main-container">
  
     <div class="right-container">
     <?php include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php include 'php/statistic/list_points_general.php'; ?>
   </div>
  
   <div class="left-container">  
   </div>

    
    <div class="middle-container">  
      
          
    <div id="metronome">
        <input type="number" id="tempoInput" class="inputstart" placeholder="Tempo (BPM)" value="120">
      <button id="startStopButtonMetronome" class="buttonstart">Start</button><br><br>
        <button id="tempo60Button" class="buttontempo">60 BPM</button>
        <button id="tempo80Button" class="buttontempo">80 BPM</button>
        <button id="tempo100Button" class="buttontempo">100 BPM</button>
    </div>

      
    <script src="js/metronome.js"></script>
      
      
    </div>
  </div>
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
