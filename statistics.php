<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
  <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="css/styleapp.css?v=1.25">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
    </header>
   <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link"><img src="images/menu/home.png" alt=""></a>
        
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="#" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link active"><img src="images/menu/chart.png" alt=""></a>
       
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
      
      
    
   <?php include 'php/statistic/list_exercise.php'; ?>

      
      <h3 style="text-align: center;">Statystyki na obecny miesiąc</h3>
    <?php include 'php/statistic/chart_month.php'; ?>

        <h3 style="text-align: center;">Statystyki ogólne</h3>
    <?php include 'php/statistic/chart_general.php'; ?>
      
        <h3 style="text-align: center;">Bilans dzienny</h3>
    <?php include 'php/statistic/chart_general_day.php'; ?>
   
      
            
       <h3 style="text-align: center;">Najlepsze wyniki</h3>
      <h4>Najdłuższe dzienne ćwiczenie: </h4>
     <?php include 'php/statistic/list_best_results.php'; ?>
    
      
    </div>
  </div>
  
   <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
