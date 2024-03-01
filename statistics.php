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
   <h3 class="panel-info">Statystyki</h3>
       <a href="home.php" class="image-link"><img src="admin/icons/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/icons/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/icons/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/icons/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/icons/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="admin/icons/user.png" alt=""></a>
    </nav>
   <div class="container-right">
     <?php include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php include 'php/statistic/list_points_general.php'; ?>
   </div>
  
   <div class="container-left">
   <div id="chat-box"></div>
   <input type="text" id="message" class="inputchat" placeholder="Wpisz wiadomość">
   <button onclick="sendMessage()" class="inputbutton">OK</button>

    <script src="js/chat.js"></script>
   </div>
  
  
  
    <div class="container">
    
   <?php include 'php/statistic/list_exercise.php'; ?>


        <h3 style="text-align: center;">Statystyki ogólne</h3>
    <?php include 'php/statistic/chart_general.php'; ?>
             
      
        <h3 style="text-align: center;">Bilans dzienny</h3>
    <?php include 'php/statistic/chart_general_day.php'; ?>
   
      
            
       <h3 style="text-align: center;">Najlepsze wyniki</h3>
      <h4>Najdłuższe dzienne ćwiczenie: </h4>
     <?php include 'php/statistic/list_best_results.php'; ?>
    
</body>
</html>
