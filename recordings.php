<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="css/styleapp.css?v=3.2">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
  
     
    #startRecording{
      font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: #008CBA;
    color: white;
    border: none;
    cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
   #startRecording:hover {
    background-color: #454545;
}
    
    #stopRecording{
      font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: #008CBA;
    color: white;
    border: none;
    cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    #stopRecording:hover {
    background-color: #454545;
}
    
    #sendRecording{
      font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    background-color: grey;
    color: white;
    border: none;
    cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    #sendRecording:hover {
    background-color: #454545;
}

    #stopRecording:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
    
    #sendRecording:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
   
    #recordedAudio {
      width: 50%;
      margin-top: 20px;
      margin: 5px;
    }
        
    
  
  </style>
</head>
<body>
    <header> 
    </header>
   
  
  
  
    <div class="menu">
    <div class="left-item">
        <a href="home.php" class="image-link active"><img src="images/menu/home.png" alt=""></a>
        
    </div>
    <div class="middle-item">
     
       <a href="metronome.php" class="image-link"><img src="images/menu/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="images/menu/tuner.png" alt=""></a>
      <a href="songs.php" class="image-link"><img src="images/menu/songs.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="images/menu/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="images/menu/chart.png" alt=""></a>
      <a href="#" class="image-link"><img src="images/menu/microphone.png" alt=""></a>
       
    </div>
    <div class="right-item">
      <a href="#" id="messageMenu" class="image-link"><img src="images/menu/message.png" alt=""></a>
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
       
    windowContent.style.display = windowContent.style.display === 'none' ? 'block' : 'none';
    }) 
    ;
</script>
  
  
  <div class="main-container">
  
     <div class="right-container">
     
   
   
   </div>
  <!--
   <div class="left-container">

   </div>
-->
    
   
  
     
    
    <div class="middle-container">  
      <div class=news>
      
     
    
        <h1>Nagrywanie dźwięku z mikrofonu</h1>
        
 <div id="limitOfRecordings"></div>
        <label>Utwór:</label>
        <select id="title" name="title">
            <option value="Nearer">Nearer my God</option>
            <option value="Cant">Cant help</option>
        </select>
        
    <br>
        
    <button id="startRecording">Rozpocznij nagrywanie</button>
    <button id="stopRecording" disabled>Zatrzymaj nagrywanie</button>
    <button id="sendRecording" disabled>Wyślij nagranie</button>
    <audio id="recordedAudio" controls></audio>

      </div>
      
       <script>
        

   
        
         
        const startRecordingButton = document.getElementById('startRecording');
        const stopRecordingButton = document.getElementById('stopRecording');
         const sendRecordingButton = document.getElementById('sendRecording');
        const recordedAudio = document.getElementById('recordedAudio');
        let mediaRecorder;
        let audioChunks = [];
let limitOfRecordings =3;
          
         
      
  
         
         startRecordingButton.addEventListener('click', async () => {
            try {
              if(limitOfRecordings>0){
              audioChunks = []; // reset poprzedniego nagrania
   
              
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.addEventListener('dataavailable', event => {
                    audioChunks.push(event.data);
                });

                mediaRecorder.addEventListener('stop', () => {
                    const audioBlob = new Blob(audioChunks, { 'type': 'audio/wav' });
                    const audioUrl = URL.createObjectURL(audioBlob);
                    recordedAudio.src = audioUrl;
                });

                startRecordingButton.disabled = true;
                stopRecordingButton.disabled = false;

                mediaRecorder.start();
               limitOfRecordings--;
              }
            } catch (error) {
                console.error('Błąd dostępu do mikrofonu:', error);
            }
        });
         
          let limit = document.getElementById('limitOfRecordings');
       
        stopRecordingButton.addEventListener('click', () => {
            mediaRecorder.stop();
            startRecordingButton.disabled = false;
            stopRecordingButton.disabled = true;
          sendRecordingButton.disabled = false;
          limit.innerHTML = "Limit prób: " + limitOfRecordings;
        });
       
         
         
  sendRecordingButton.addEventListener('click', async () => {
    var titleInput = document.getElementById('title');
    var titleValue = titleInput.value;
    
     // Utworzenie obiektu Date, który reprezentuje aktualną datę
        var currentDate = new Date();

        // Pobranie miesiąca (wartości od 0 do 11, więc dodajemy 1)
        var currentMonth = currentDate.getMonth() + 1;

        // Pobranie roku
        var currentYear = currentDate.getFullYear();

        // Wyświetlenie miesiąca i roku
       // var currentMonthYearElement = document.getElementById("currentMonthYear");
       // currentMonthYearElement.textContent = "Miesiąc: " + currentMonth + ", Rok: " + currentYear;
    
    var recordingName ="<?php echo $instrument;?>" +"_"+ currentMonth + "_" + currentYear +"_"+ titleValue + ".wav";
    alert(recordingName);
    
    
    
    
    
    
    try {
        const audioBlob = new Blob(audioChunks, { 'type': 'audio/wav' });
        const formData = new FormData();
        //formData.append('audio_data', audioBlob, 'recording.wav');
formData.append('audio_data', audioBlob, recordingName);
        const response = await fetch('php/save_recording.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const filePath = await response.text();
            alert('Nagranie zostało zapisane na serwerze pod ścieżką: ' + filePath);
        } else {
            //throw new Error('Błąd podczas przesyłania nagrania na serwer.');
          alert('Błąd podczas przesyłania nagrania na serwer.');
        }
    } catch (error) {
       // console.error('Błąd podczas przesyłania nagrania:', error);
      alert('Błąd podczas przesyłania nagrania:', error);
    }
});
 
       
    </script>
   
      
    
     

      
echo "<tr>";
echo "<td><strong>Total</strong></td>";
//echo "<td><strong>$total</strong></td>";
      echo "<td></td>";
echo "<td><strong>$p_violin1Total</strong>%</td>";
echo "<td><strong>$p_violin2Total</strong>%</td>";
echo "<td><strong>$p_violaTotal</strong>%</td>";
echo "<td><strong>$p_celloTotal</strong>%</td>";
echo "</tr>";
      
 
           //echo '<div class="a">' . $line . '</div>';
           
           */
?>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
  
      
    </div>
  </div>
      


    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
