<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="css/styleapp.css?v=1.0">
  <style>
.test {
  display: flex;
  flex-direction: column;
  align-items: center;
}
    .label {
        padding: 25px; /* mniej miejsca wokół tekstu */
      font-size: 18px; /* większa czcionka */
      
     
       
    }
    
    .input {
    margin: auto; /* Automatyczne wyśrodkowanie kontenera */  
      
        margin-bottom: 2px;
        padding: 10px; /* mniej miejsca wokół tekstu */
        width: 160px; /* szerokość hiperłącza */
        font-size: 18px; /* większa czcionka */
        line-height: 15px; /* odstęp między liniami */
      
      
    
        justify-content: center; /* Wyśrodkowanie w poziomie */
        align-items: center; /* Wyśrodkowanie w pionie */
  
    }
    .button {margin: auto; /* Automatyczne wyśrodkowanie kontenera */
      
        display: block;
        margin-bottom: 5px;
        border: 1px solid black; /* węższe obramowanie */
        padding: 10px; /* mniej miejsca wokół tekstu */
        width: 300px; /* szerokość hiperłącza */
        text-decoration: none; /* wyłączenie podkreślenia */
        color: #333; /* kolor tekstu */
        font-family: Arial, sans-serif; /* wybrany font */
        font-size: 18px; /* większa czcionka */
        line-height: 15px; /* odstęp między liniami */
       text-align: center; /* tekst na środku */
      
     display: flex; /* Używamy flexbox do wyśrodkowania tekstu */
        justify-content: center; /* Wyśrodkowanie w poziomie */
        align-items: center; /* Wyśrodkowanie w pionie */
  
    }
    
    .button img {
        margin-right: 15px; /* odstęp między obrazkiem a tekstem */
        width: 20px; /* szerokość obrazka */
      height: 20px; /* wysokość obrazka */}
      
    .button:hover {
        background-color: #f0f0f0; /* zmiana koloru tła po najechaniu myszką */
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
     <?php include 'php/statistic/points.php'; ?>
   </div>
  
   <div class="container-left">
   <div id="chat-box"></div>
   <input type="text" id="message" class="inputchat" placeholder="Wpisz wiadomość">
   <button onclick="sendMessage()" class="inputbutton">OK</button>

    <script src="js/chat.js"></script>
   </div>
  
   <div class="container-left">
   <div id="chat-box"></div>
   <input type="text" id="message" class="inputchat" placeholder="Wpisz wiadomość">
   <button onclick="sendMessage()" class="inputbutton">OK</button>

    <script src="js/chat.js"></script>
   </div>
    <div class="container">
       
    
  
    
    <form action="" method="post" class="test">
      <label class="label" for="numberInput">Czas (min):</label>
        <input class="input" type="text" id="numberInput" name="numberInput" required><br>
        <button class="button" type="submit" name="redirect"><img src="admin/logout.png" alt="">Wyślij</button>
    </form>

      
      <?php include 'php/addnewexercise.php'; ?>
      

        </div>
      
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
 
</body>
</html>
