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
  
       h1 {
      color: #333;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      margin: 10px;
      transition: background-color 0.3s ease;
    }
    button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
    button:hover {
      background-color: #0056b3;
    }
    #recordedAudio {
      width: 80%;
      margin-top: 20px;
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
     
    <?php include 'php/active/active_group.php';?>
   
   </div>
  
   <div class="left-container">
     <?php include 'php/statistic/list_points_month.php'; ?>
     
  <?php include 'php/statistic/chart_day.php'; ?>
   <br>
   <?php include 'php/statistic/chart_yesterday.php'; ?>
       
       <br><br>
       
     <?php// include 'php/statistic/percent_master.php'; ?>
     <br><br>
     <?php// include 'php/statistic/list_points_general.php'; ?>
   </div>

    
   
  
     
    
    <div class="middle-container">  
      
      
      
    <h1>Nagrywanie dźwięku z mikrofonu</h1>

    <button id="startRecording">Rozpocznij nagrywanie</button>
    <button id="stopRecording" disabled>Zatrzymaj nagrywanie</button>
    <button id="sendRecording" disabled>Wyślij nagranie</button>
    <audio id="recordedAudio" controls></audio>

      
      
       <script>
        const startRecordingButton = document.getElementById('startRecording');
        const stopRecordingButton = document.getElementById('stopRecording');
         const sendRecordingButton = document.getElementById('sendRecording');
        const recordedAudio = document.getElementById('recordedAudio');
        let mediaRecorder;
        let audioChunks = [];

        startRecordingButton.addEventListener('click', async () => {
            try {
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
            } catch (error) {
                console.error('Błąd dostępu do mikrofonu:', error);
            }
        });

        stopRecordingButton.addEventListener('click', () => {
            mediaRecorder.stop();
            startRecordingButton.disabled = false;
            stopRecordingButton.disabled = true;
          sendRecordingButton.disabled = false;
        });
       
         
         
  sendRecordingButton.addEventListener('click', async () => {
    try {
        const audioBlob = new Blob(audioChunks, { 'type': 'audio/wav' });
        const formData = new FormData();
        formData.append('audio_data', audioBlob, 'recording.wav');

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
   
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
  
      
    </div>
  </div>
      


    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
