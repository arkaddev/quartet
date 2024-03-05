<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
  <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="css/styleapp.css?v=1.26">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
      <a href="songs.php" class="image-link active"><img src="images/menu/songs.png" alt=""></a>
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
  
      
      
      
      
     
      
      
      <?php
/*
// Odczytaj dane z pliku JSON
$json_data = file_get_contents('data/songs.json');

// Dekoduj dane JSON do tablicy asocjacyjnej
$data = json_decode($json_data, true);
      
// Wyświetl odczytane dane
foreach ($data as $item) {
    echo "Tytuł: " . $item['title'] . "<br>";
    echo "Całkowita długość: " . $item['total'] . "<br>";
    echo "violin1: " . $item['violin1'] . "<br>";
    echo "violin2: " . $item['violin2'] . "<br>";
    echo "viola: " . $item['viola'] . "<br>";
    echo "cello: " . $item['cello'] . "<br><br>";
}
*/
      
   // Odczyt danych z pliku JSON
$data = file_get_contents('data/songs.json');
$pieces = json_decode($data, true);

// Tworzenie tabeli HTML
echo "<table>";
echo "<tr><th>Title</th><th>Total</th><th>Violin 1</th><th>Violin 2</th><th>Viola</th><th>Cello</th></tr>";

      $instrument = "violin1";
      
      foreach ($pieces as $piece) {
        echo "<tr>";
        echo "<td>" . $piece['title'] . "</td>";
        echo "<td>" . $piece['total'] . "</td>";
    
        echo "<td>" . $piece['violin1'];
        echo '<button onclick="violin1Button(\'' . $piece['title'] . '\')">Click</button>';  
        if ($instrument == "violin1") {
            echo "<button onclick='myFunction(\"".$piece['title']."\")'>a</button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['violin2'];
        echo '<button onclick="violin2Button(\'' . $piece['title'] . '\')">Click</button>';
        if ($instrument == "violin2") {
            echo "<button onclick='myFunction(\"".$piece['title']."\")'>a</button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['viola'];
        echo '<button onclick="violaButton(\'' . $piece['title'] . '\')">Click</button>';
       if ($instrument == "viola") {
            echo "<button onclick='myFunction(\"".$piece['title']."\")'>a</button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['cello'];
        echo '<button onclick="celloButton(\'' . $piece['title'] . '\')">Click</button>';
        if ($instrument == "cello") {
            echo "<button onclick='myFunction(\"".$piece['title']."\")'>a</button></td>";  
        } else {
            echo "</td>";}
        
    echo "</tr>";
}
      
      
// Obliczanie sumy danych
$total = 0;
$violin1Total = 0;
$violin2Total = 0;
$violaTotal = 0;
$celloTotal = 0;

foreach ($pieces as $piece) {
    $total += $piece['total'];
    $violin1Total += $piece['violin1'];
    $violin2Total += $piece['violin2'];
    $violaTotal += $piece['viola'];
    $celloTotal += $piece['cello'];
}

// Wyświetlanie podsumowania
echo "<tr>";
echo "<td><strong>Total</strong></td>";
echo "<td><strong>$total</strong></td>";
echo "<td><strong>$violin1Total</strong></td>";
echo "<td><strong>$violin2Total</strong></td>";
echo "<td><strong>$violaTotal</strong></td>";
echo "<td><strong>$celloTotal</strong></td>";
echo "</tr>";
      
echo "</table>";   
      
      
      
      
      
      
      
      
      
      
        //echo '<div class="a">' . $line . '</div>';
   
?>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        <h2>Utwory</h2>
        
        <button onclick="">Start (Nearer My God to thee - 70 BPM)</button>
        <button onclick="">Stop</button>
        <br>
        <button disabled onclick="playSound('audio1')">s1</button>
        <button disabled onclick="playSound('audio2')">s1</button>
        <button disabled onclick="playSound('audio3')">a</button>
        <button disabled onclick="playSound('audio4')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="">Start (Cant help - 70 BPM)</button>
        <button onclick="">Stop</button>
        <br>
        <button disabled onclick="playSound('audio5')">s1</button>
        <button disabled onclick="playSound('audio6')">s1</button>
        <button onclick="playSound('audio7')">a</button>
        <button disabled onclick="playSound('audio8')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="startMetronome(85)">Start (Wedding march Wagner - 85 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio9')">s1</button>
        <button disabled onclick="playSound('audio10')">s1</button>
        <button onclick="playSound('audio11')">a</button>
        <button disabled onclick="playSound('audio12')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <button onclick="startMetronome(105)">Start (Hungarian dance - 105 BPM)</button>
        <button onclick="stopMetronome()">Stop</button>
        <br>
        <button disabled onclick="playSound('audio13')">s1</button>
        <button disabled onclick="playSound('audio14')">s1</button>
        <button disabled onclick="playSound('audio15')">a</button>
        <button disabled onclick="playSound('audio16')">w</button>
        <button onclick="pauseAudio()">Zatrzymaj</button>
        <br><br>
        
        <audio id="audio7" src="admin/sounds/altowka cant help.mp3"></audio>
        <audio id="audio11" src="admin/sounds/altowka wagner.mp3"></audio>
  
      
    
    </div>
  </div>
  
   <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
