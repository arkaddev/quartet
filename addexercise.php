<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="css/styleapp.css?v=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>

    
    
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
    
    

    
    .container{
      text-align: center;
    }
    
    
    

#timer {
    font-size: 70px;
    margin-bottom: 20px;
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
   <header> 
    </header>
<nav>
         <h3 class="panel-info">Dodaj ćwiczenie</h3>

       <a href="home.php" class="image-link"><img src="admin/icons/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/icons/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/icons/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/icons/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/icons/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="admin/icons/user.png" alt=""></a>
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
      
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
 
</body>
</html>
