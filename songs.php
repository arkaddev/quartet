<?php include 'php/session.php';?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
  <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="css/styleapp.css?v=1.26">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    
     .button-play{
    width: 30px; /* ustaw szerokość i wysokość obrazka */
    height: 30px;
    background-image: url(images/songs/play.png); /* ścieżka do obrazka */
    background-size: cover; /* dostosuj rozmiar obrazka do wymiarów przycisku */
       background-color: green;
       margin-left: 20px;
       margin-right: 5px;
     }
     
     .button-settings{
    width: 30px; /* ustaw szerokość i wysokość obrazka */
    height: 30px;
    background-image: url(images/songs/settings.png); /* ścieżka do obrazka */
    background-size: cover; /* dostosuj rozmiar obrazka do wymiarów przycisku */
     }
     
     .button-tempo{
    width: 100px; /* ustaw szerokość i wysokość obrazka */
    height: 30px;
       background-color: #008CBA;
    color: white;
       border: none;
      
     }
     
     .button-tempo:hover {
    background-color: #454545;
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
  <!--
     <div id="window" class="chat-container">
    <div id="minimalization">&#x2014;</div>
    <div id="chat-box"></div>
      
      <div class="chat-input-button">
        <input type="text" id="message" class="chat-input" placeholder="Wpisz wiadomość">
        <button onclick="sendMessage()" class="chat-button">OK</button>
      </div>
  </div>
  -->
  <!-- Wartość zmiennej PHP przekazana do atrybutu data -->
 <!--
<div id="data" data-username="
<?php//echo htmlspecialchars($username);?>"></div>

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
  -->
  <div class="main-container">
<div class="right-container">
<?php//include 'php/statistic/percent_master.php';?>
<br><br>
<?php//include 'php/statistic/list_points_general.php';?>
</div>
  <!--
   <div class="left-container">
    
  
   </div>

    
   -->
  
     
    
    <div class="middle-container">  
  
      
<?php
// Odczyt danych z pliku JSON
$data = file_get_contents('data/songs.json');
$data = json_decode($data, true);

// Tworzenie tabeli HTML
echo "<table>";
echo "<tr><th>Tytuł</th><th>Metronom</th><th>Skrzypce 1</th><th>Skrzypce 2</th><th>Altówka</th><th>Wiolonczela</th></tr>";

     $i = 1;
      foreach ($data as $piece) {
        
        echo "<tr>";
        echo "<td>" . $piece['title'] . "</td>";
        echo "<td> <button onclick='myFunctionTempo(\"".$piece['tempo']."\",\"".$i."\")' class='button-tempo' id='buttonTempo".$i."' name='additionalData' value='someValue'>".$piece['tempo']."</button></td>";  
    
        echo "<td>" . $piece['violin1']."/".$piece['total'];
        if ($instrument == "violin1") {
          echo "<button onclick='myFunction(\"".$piece['title']."\")' class='button-settings' id='myButton".$i."' name='additionalData' value='someValue'></button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['violin2']."/".$piece['total'];
        if ($instrument == "violin2") {
          echo "<button onclick='myFunction(\"".$piece['title']."\")' class='button-settings' id='myButton".$i."' name='additionalData' value='someValue'></button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['viola']."/".$piece['total'];
       if ($instrument == "viola") {
          echo "<button onclick='myFunction(\"".$piece['title']."\")' class='button-settings' id='myButton".$i."' name='additionalData' value='someValue'></button></td>";  
        } else {
            echo "</td>";}
        
        echo "<td>" . $piece['cello']."/".$piece['total'];
        if ($instrument == "cello") {
          echo "<button onclick='myFunctionSettings(\"".$piece['title']."\")' class='button-settings' id='myButton".$i."' name='additionalData' value='someValue'></button></td>";  
        } else {
            echo "</td>";}
        
    echo "</tr>";
        $i++;
     
}
      
      
// Obliczanie sumy danych
$total = 0;
$violin1Total = 0;
$violin2Total = 0;
$violaTotal = 0;
$celloTotal = 0;

foreach ($data as $piece) {
    $total += $piece['total'];
    $violin1Total += $piece['violin1'];
    $violin2Total += $piece['violin2'];
    $violaTotal += $piece['viola'];
    $celloTotal += $piece['cello'];
}

// Wyświetlanie podsumowania
      
    //zaokraglenie do 1 miejsca po przecinku
    //wynik podany w procentach
    $p_violin1Total=round(100*$violin1Total/$total,1);
    $p_violin2Total=round(100*$violin2Total/$total,1);
    $p_violaTotal=round(100*$violaTotal/$total,1);
    $p_celloTotal=round(100*$celloTotal/$total,1);
      
echo "<tr>";
echo "<td><strong>Total</strong></td>";
echo "<td><strong>$total</strong></td>";
echo "<td><strong>$p_violin1Total</strong>%</td>";
echo "<td><strong>$p_violin2Total</strong>%</td>";
echo "<td><strong>$p_violaTotal</strong>%</td>";
echo "<td><strong>$p_celloTotal</strong>%</td>";
echo "</tr>";
      
echo "</table>";   
           //echo '<div class="a">' . $line . '</div>';
?>

      
      
      
     
        <input type="hidden" id="tempoInput" class="inputstart" placeholder="Tempo (BPM)" value="120">      
    <script src="js/metronome.js"></script>
      
      <script>
         function myFunctionSettings(title) {
        var bars = prompt("Proszę wprowadzić dane:");

        // Utworzenie formularza i dodanie ukrytego pola z wartością zmiennej bars
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = ''; // Wpisz nazwę swojego skryptu PHP

        var inputBars = document.createElement('input');
        inputBars.type = 'hidden';
        inputBars.name = 'bars';
        inputBars.value = bars;

        form.appendChild(inputBars);
        document.body.appendChild(form);
           
       
        var inputTitle = document.createElement('input');
        inputTitle.type = 'hidden';
        inputTitle.name = 'title';
        inputTitle.value = title;

        form.appendChild(inputTitle);
        document.body.appendChild(form);

        var inputInstrument = document.createElement('input');
        inputInstrument.type = 'hidden';
        inputInstrument.name = 'instrument';
        inputInstrument.value = "<?php echo $instrument;?>";

        form.appendChild(inputInstrument);
        document.body.appendChild(form);
           
        // Wysłanie formularza
        form.submit();
    }
        
        
        
         function myFunctionTempo(tempo, i) {
           changeTempo(tempo);
           var button = document.getElementById('buttonTempo'+i); // Pobranie przycisku po id
           var previousColor = button.style.backgroundColor; // Zapamiętanie poprzedniego koloru
     
       if (!playing) {
                playing = true;
                startMetronome();
                document.getElementById('buttonTempo'+i).innerText = 'Stop';
          
    button.style.backgroundColor = "red"; // Zmiana koloru tła przycisku na czerwony

            } else {
                playing = false;
                clearInterval(timer);
                document.getElementById('buttonTempo'+i).innerText = 'Start';
            button.style.backgroundColor = "green"; 
            }
        }

    
   
</script>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["bars"])) {
    $bars_js = $_POST["bars"];
    //echo "<p>Wprowadzono: $bars_js</p>";
  }
   if(isset($_POST['title'])) {
        $title_js = $_POST['title'];
        //echo "<p>Dodatkowe dane: $title_js</p>";
    }
  if(isset($_POST['instrument'])) {
        $instrument_js = $_POST['instrument'];
        //echo "<p>Dodatkowe dane: $instrument_js</p>";
    }


    // Wczytaj zawartość pliku JSON
$jsonString = file_get_contents('data/songs.json');

// Przetwórz JSON na tablicę PHP
$data = json_decode($jsonString, true);

// Znajdź utwór $title_js i zaktualizuj wartość dla sekcji $instrument_js
foreach ($data as &$row) {
    if ($row['title'] === $title_js) {
        // Tutaj wprowadź swoje zmiany w sekcji $instrument_js
        $row[$instrument_js] = $bars_js; // Na przykład zmień na $bars_js
    }
  
  
  
  
}

// Zapisz zmienioną tablicę jako plik JSON
file_put_contents('data/songs.json', json_encode($data, JSON_PRETTY_PRINT));

      // Następnie przekieruj stronę do siebie samej
header("Refresh:0");
//echo "Zmiany zostały wprowadzone pomyślnie.";
}
?>    
<script>
document.getElementById("myButton1").addEventListener("click", function() {
  document.getElementById("textDisplay").style.display = "block";
});
  document.getElementById("myButton2").addEventListener("click", function() {
  document.getElementById("textDisplay").style.display = "block";
});
 
</script>
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
