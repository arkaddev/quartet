<?php include 'php/session.php';?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello</title>
   <link rel="stylesheet" href="css/styleapp.css?v=1.26">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    #metronome {
      text-align: center;
      margin-top: 20px;
    }

    .tempo-input {
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
      transition: background-color 0.3s ease;
    }
   
    .start-stop-metronome-button:hover {
      background-color: #454545;
    }
        
    .tempo-button {
      font-size: 16px;
      padding: 10px 20px;
      margin: 5px;
      background-color: grey;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
   
    .tempo-button:hover {
      background-color: #454545;
    }
    
    
    
    
    
    
    
    
    
 table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: grey;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
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
     <?php include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php include 'php/statistic/list_points_general.php'; ?>
   </div>
  
   <div class="left-container">  
     
     
     <h3>Dynamika</h3>
     
     <li><strong>fff</strong> (fortissimo possibile) - możliwie najgłośniej</li>
     <li><strong>ff</strong> (fortissimo) - bardzo głośno</li>
     <li><strong>f</strong> (forte) - głośno</li>
     <li><strong>mf</strong> (mezzo forte) - dość głośno</li>
     <li><strong>mp</strong> (mezzo piano) - dość cicho</li>
     <li><strong>p</strong> (piano) - cicho</li>
     <li><strong>pp</strong> (pianissimo) - bardzo cicho</li>
     <li><strong>ppp</strong> (pianissimo possibile) - możliwie najciszej</li>
     <li>(quasi) niente - (prawie) bezgłośnie</li>
     
   </div>

    
    <div class="middle-container">  
      
          <div class="news">
    <div id="metronome">
        <input type="number" id="tempoInput" class="tempo-input" placeholder="Tempo (BPM)" value="120">
      <button id="startStopMetronomeButton" class="start-stop-metronome-button">Start</button><br><br>
      
    
      
      
      
      
      
      
        <button id="tempo60Button" class="tempo-button">60 BPM</button>
        <button id="tempo80Button" class="tempo-button">80 BPM</button>
        <button id="tempo100Button" class="tempo-button">100 BPM</button>
      <button id="tempo120Button" class="tempo-button">120 BPM</button>
        <button id="tempo140Button" class="tempo-button">140 BPM</button>
    </div>
      </div>
      
    <script src="js/metronome.js"></script>
      
      
      
      
        <table>
   <!--
          <caption></caption>
    -->
          <thead>
        <tr>
            <th>Tempo</th>
            <th>BPM</th>
            <th>Metronom</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Larghissimo</td>
            <td>24 and under</td>
          <td><button onclick="changeTempo('24')">24 BPM</button></td>
        </tr>
        <tr>
            <td>Adagissimo and Grave</td>
            <td>24–40</td>
            
        </tr>
        <tr>
            <td>Largo</td>
            <td>40–66</td>
          
        </tr>
      <tr>
            <td>Larghetto</td>
            <td>44–66</td>
          
        </tr>
      <tr>
            <td>Adagio</td>
            <td>44–66</td>
          
        </tr>
       <tr>
            <td>Adagietto</td>
            <td>46–80</td>
          
        </tr>
       <tr>
            <td>Lento</td>
            <td>52–108</td>
          
        </tr>
      <tr>
            <td>Andante</td>
            <td>56–108</td>
          
        </tr>
      <tr>
            <td>Andantino</td>
            <td>80–108</td>
          
        </tr>
      <tr>
            <td>Marcia moderato</td>
            <td>66–80</td>
          
        </tr>
      <tr>
            <td>Andante moderato</td>
            <td>80–108</td>
          
        </tr>
      <tr>
            <td>Moderato</td>
            <td>108–120</td>
          
        </tr>
      <tr>
            <td>Allegretto</td>
            <td>112–120</td>
          
        </tr>
      <tr>
            <td>Allegro moderato</td>
            <td>116–120</td>
          
        </tr>
     
      <tr>
            <td>Allegro</td>
            <td>120–156</td>
          
        </tr>
      <tr>
            <td>Molto Allegro or Allegro vivace</td>
            <td>124–156</td>
          
        </tr>
      <tr>
            <td>Vivace</td>
            <td>156–176</td>
          
        </tr>
      <tr>
            <td>Vivacissimo and Allegrissimo</td>
            <td>172–176</td>
          
        </tr>
      <tr>
            <td>Presto</td>
            <td>168–200</td>
          
        </tr>
      <tr>
            <td>Prestissimo</td>
            <td>200 and over</td>
          
        </tr>
   
    </tbody>
</table>
      
          
    
      
    

    </div>
  </div>
  
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
