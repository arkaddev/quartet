<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="css/styleapp.css?v=1.25">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.37/Tone.js"></script>
   <style>
    /* Stylizacja klawiszy pianina */
    .piano {
        display: flex;
        justify-content: space-between;
        width: 220px; /* Szerokość całego pianina */
        margin: 10px auto;
    }

    .key {
         position: relative;
        flex: 1;
       width: 100px;
        height: 80px; /* Wysokość klawisza */
        background-color: #f2f2f2;
        border: 1px solid #000;
        border-radius: 0 0 5px 5px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: flex-end;
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
       <a href="tuner.php" class="image-link active"><img src="images/menu/tuner.png" alt=""></a>
      <a href="#" class="image-link"><img src="images/menu/songs.png" alt=""></a>
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
      
      
  
      
      
        
      
      <h3 style="text-align: center;">skrzypce</h3>
      <div class="piano">
    <div class="key" data-sound="admin/sounds/g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/a.mp3"><span>A</span></div>
    <div class="key" data-sound="admin/sounds/e.mp3"><span>E</span></div>
</div>
     <h3 style="text-align: center;">altówka</h3>
      <div class="piano">
    <div class="key" data-sound="admin/sounds/c.mp3"><span>C</span></div>
    <div class="key" data-sound="admin/sounds/g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/a.mp3"><span>A</span></div>
</div>
      <h3 style="text-align: center;">wiolonczela</h3>
      <div class="piano">
   <div class="key" data-sound="admin/sounds/cello c.mp3"><span>C</span></div>
    <div class="key" data-sound="admin/sounds/cello g.mp3"><span>G</span></div>
    <div class="key" data-sound="admin/sounds/cello d.mp3"><span>D</span></div>
    <div class="key" data-sound="admin/sounds/cello a.mp3"><span>A</span></div>
</div>
      
      
      
      
      <audio id="audio"></audio>

<script>
    document.querySelectorAll('.key').forEach(key => {
        key.addEventListener('click', () => {
            const sound = new Audio(key.getAttribute('data-sound'));
            sound.play();
        });
    });
</script>
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>
      
  
  

      
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
