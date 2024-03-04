<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
   <link rel="stylesheet" href="css/styleapp.css?v=1.25">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>

    
    .middle-container{
      
      text-align: center;
    }
    
    
    .input-manually {
 
        margin: 5px;
        padding: 10px 20px; /* mniej miejsca wokół tekstu */
        width: 160px; /* szerokość hiperłącza */
        font-size: 16px; /* większa czcionka */
        
  
    }
    .button-manually {
     font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: #0078A8;
    color: white;
    border: none;
    cursor: pointer;
    }
    
    

    

#timer {
    font-size: 70px;
    margin-bottom: 20px;
  margin-top: 10px;
}

.button-timer {
    font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

.button-timer:hover {
    background-color: #45a049;
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
      <a href="#" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link active"><img src="images/menu/add.png" alt=""></a>
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
  
  
  
   <div id="chat-box">
   <div class="chat">
    <input type="text" id="message" class="input-chat" placeholder="Wpisz wiadomość">
   <button onclick="sendMessage()" class="button-chat">OK</button>
  </div></div>
  
  <script src="js/chat.js"></script>
  
  <div class="main-container">
  
     <div class="right-container">
     <?php include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php include 'php/statistic/list_points_general.php'; ?>
   </div>
  
   <div class="left-container">
    
  
   </div>

    
   
  
     
    
    <div class="middle-container">  
      
      
  
      
  
  
  
  
  
  
  
  
    <h1>Stoper</h1>
    <h5>nie zamykaj strony w trakcie ćwiczenia</h5>
<p id="timer">00:00:00</p>
<button id="startStopButton" class="button-timer">Start/Stop</button>
<button id="resetButton" class="button-timer">Reset</button>
<button id="saveButton" class="button-timer" disabled>Zapisz</button>
<script src="js/add_exercise_timer.js"></script>
      
<br><br><br><br><br>
      <h1>Wpis manualny</h1>
      
    <form action="" method="post">
      <input class="input-manually" type="text" id="numberInput" name="numberInput" placeholder="Czas (min):" required>
      <button class="button-manually" type="submit" name="redirect">Zapisz</button>
    </form>

      
      <?php include 'php/add_exercise_manually.php'; ?>
      
     

    </div>
  </div>
    
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
 
</body>
</html>
