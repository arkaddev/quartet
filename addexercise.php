<?php include 'php/session.php';?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
   <link rel="stylesheet" href="css/styleapp.css?v=2.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  .input-manually {
        margin: 5px;
        padding: 10px 20px; 
        width: 160px;
        font-size: 16px;
    }
    
    .button-manually {
    font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: grey;
    color: white;
    border: none;
    cursor: pointer;
    }
    
    .button-manually:hover {
    background-color: #454545;
}

  .button-timer {
    font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: #008CBA;
    color: white;
    border: none;
    cursor: pointer;
}

  
  
  
 
.button-timer:hover {
    background-color: #454545;
}
     .middle-container{ 
      text-align: center;
    }
  
  #timer {
    font-size: 70px;
    margin-bottom: 20px;
  margin-top: 10px;
  }
    
    
    
    
    
    
    
        #metronome {
            text-align: center;
        }

        .tempo-input{
            font-size: 24px;
            padding: 8px 16px;
          width: 70px;
        }

        .start-stop-metronome-button {
           background-color: #008CBA;
         padding: 10px 20px;
            font-size: 24px;
            color: #fff;
            border: none;
        }
   .start-stop-metronome-button:hover {
    background-color: #454545;
}
 
  
   #saveButton {
    background-color: #008CBA;
}

#saveButton:hover {
    background-color: #0078A8;
}
  
  </style>
</head>
<body>
 
  
  
  
    <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link"><img src="images/menu/home.png" alt=""></a>
      
        
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="songs.php" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link active"><img src="images/menu/add.png" alt=""></a>
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
<div id="data" data-username="<?php echo htmlspecialchars($username);?>"></div>

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
       
        <div id="metronome">
        <input type="number" id="tempoInput" class="tempo-input" placeholder="Tempo (BPM)" value="120">
      <button id="startStopMetronomeButton" class="start-stop-metronome-button">Start</button><br><br>
    </div>

      
    <script src="js/metronome.js"></script>
       
       
       
   </div>
  
   <div class="left-container">
    
  
   </div>

    
   
  
     
    
    <div class="middle-container">  
      
      
  
      
  
  
  
  
  
  
  <div class="news">
  
    <h1>Stoper</h1>
    <h5>nie zamykaj strony w trakcie ćwiczenia</h5>
<p id="timer">00:00:00</p>
<button id="startStopButton" class="button-timer">Start/Stop</button>
<button id="resetButton" class="button-timer">Reset</button>
<button id="saveButton" class="button-timer-save" disabled>Zapisz</button>
    
<script src="js/add_exercise_timer.js"></script>
      </div>
<br><br><br>
     <div class="news">
      <h1>Wpis manualny</h1>
      
    <form action="" method="post">
      <input class="input-manually" type="number" id="numberInput" name="numberInput" placeholder="Czas (min):" required min="15">
      <button class="button-manually" type="submit" name="redirect">Zapisz</button>
    </form>
<?php include 'php/add_exercise_manually.php';?>
     
      </div>

    </div>
  </div>
    
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
 
</body>
</html>
