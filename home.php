<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="css/styleapp.css?v=3.1">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
     border-radius: 10px;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
          
          
        }
        th {
          display: none;
        }
        
    .online{
      color: green;
    }
  
  
  </style>

</head>
<body>
    <header> 
    </header>
   
  
  
  
    <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link active"><img src="images/menu/home.png" alt=""></a>
        <a href="#" id="messageMenu" class="image-link"><img src="images/menu/message.png" alt=""></a>
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="songs.php" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="images/menu/chart.png" alt=""></a>
       
    </div>
    <div class="right-item">
        <a href="#" class="image-link" id="menu-button"><img src="images/menu/user.png" alt=""></a>
      <div class="submenu" id="submenu">
            <a href="user.php">Ustawienia</a>
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
        // Minimalizacja okna
        windowContent.style.display = windowContent.style.display === 'none' ? 'block' : 'none';
    })
    
    
    ;
</script>
  
  
  <div class="main-container">
  
     <div class="right-container">
     
    
   <?php include 'php/statistic/chart_day.php'; ?>
   <br>
   <?php include 'php/statistic/chart_yesterday.php'; ?>
       
       <br><br>
       
     <?php include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php include 'php/statistic/list_points_general.php'; ?>
   </div>
  
   <div class="left-container">
    <?php include 'php/active/active_group.php';?>
  
   </div>

    
   
  
     
    
    <div class="middle-container">  
      
      <div class="news">
      <h5>09.03.2024</h5>
      <h2>Aktualizacja Broken Cello app!</h2>
      <p>Utworzono wykresy na stronie głównej.<br><br>
       Wykresy zawierają wyniki z bieżącego oraz poprzedniego dnia.<br>
        </p>
    </div>
      

      
    </div>
  </div>
      


    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
