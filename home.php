<?php include 'php/session.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    
        min-height: 100vh; /* Minimalna wysokość strony, aby stopka zawsze była na dole */
        position: relative; /* Ustawia strony jako referencję dla absolutnie pozycjonowanej stopki */
   
   
  }

  .menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 10px;
  
  }
  .menu a{
        background-color: transparent;
        border: none;
        color: #fff;
        padding: 5px 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none; /* podkreslenie */
  }
  
  .menu a:hover {
        background-color: rgba(255, 255, 255, 0.1);
  }
  
  .menu .image-link img {
    max-width: 35px; /* Ustaw maksymalną szerokość obrazka */
    max-height: 35px; /* Ustaw maksymalną wysokość obrazka */
    filter: invert(100%);
  }
  
  .middle-item a {
        margin: 0 10px;
  }
  
  .right-item {
        position: relative;
    }
  
  .right-item:hover .submenu {
        /*display: block;*/ /*otwarcie menu po najechaniu myszka */
    }
  
  .right-item .submenu {
        adisplay: none;/* otwarcie menu po najechaniu myszka */
        position: absolute;
        atop: 100%;
        right: 5%;
        abackground-color: #333;
        padding: 10px;
    }

    
    .submenu{
        adisplay: block;/* otwarcie menu po najechaniu myszka */
        display: none;
        color: #fff;
        background-color: #444;
        text-decoration: none;
        padding: 5px 0;
        transition: background-color 0.3s ease;
      
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 4px;
  }
 
        .submenu a {
          display: block;
          padding: 15px 70px;
  }
  
  .submenu a:hover {
        abackground-color: rgba(255, 255, 255, 0.1);
    }

a.active{
  text-decoration: underline;
  color: #333; /* Kolor tekstu dla aktywnego linku */
  border-bottom: 2px solid yellow; /* Podkreślenie w kolorze żółtym */
 
  border-radius: 20px;

  }
    
    

  
  .main-container {
    display: flex; /* Użyj flexboxa do ustawienia elementów w rzędzie */
    justify-content: space-between; /* Ustawienie odstępu między elementami */
    width: 100%; /* Możesz dostosować szerokość według potrzeb */
    aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    padding: 10px; /* Dostosuj wypełnienie zewnętrznego kontenera */
    box-sizing: border-box; /* Upewnij się, że padding nie wpływa na całkowitą szerokość kontenera 
    */
    background-color: #DCDCDC;
    amargin: 10px 10px 10px 0; /* Dodaje odstęp na górze, dole i po lewej stronie, bez marginesu po prawej stronie */
    }
    
  .left-container{
    order: -1; /* Ustawia pierwszy kontener na lewo */
    aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    width: 25%; /* Przykładowa szerokość */
    margin-right: 15px;
    margin-top: 20px;
    
    abackground-color: #f9f9f9;
    aborder-radius: 10px;
    abox-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    font-size: 15px;
    
    padding: 15px;
  atop: 0; /* Ustawia górną krawędź na górze okna przeglądarki */
  atop: 25%; /* Ustawia górną krawędź na połowie wysokości okna przeglądarki */
  abottom: 50px;
  aheight: 60%; /* Ustawia wysokość na 100% rodzica (czyli okna przeglądarki) */
}
  
  
  
  .middle-container {
    aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    margin-left: auto; /* Ustawia drugi kontener na środku */
    margin-right: auto;
    margin-top: 20px;
    
    padding: 20px;
    
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
  
   .right-container {
     aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
     order: 1; /* Ustawia trzeci kontener na prawo */
     width: 25%; /* Przykładowa szerokość */
     margin-left: 15px;
     margin-top: 20px;
     
     abackground-color: #f9f9f9;
     aborder-radius: 10px;
     abox-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    
     padding: 20px;
  
     font-size: 15px;
}
  
 
    
    .news {
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

  

    
      
  
  
 
 
  
  footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: absolute;
    bottom: 0;
    width: 98%;
    bottom: 0;
    
        line-height: 50px; /* Wyrównuje wysokość tekstu do wysokości stopki */
}
  
    
  #chat-box{
    position: fixed;
    bottom: 0;
    width: 250px; /* Szerokość */
    height: 350px; /* Wysokość */
background-color: #f9f9f9;
        color: black;
        padding: 20px;
  overflow: auto;
    margin-left: 10px;
   border: 1px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    border-radius: 5px;
  }
  
  
   .achat-message {
  border: 1px solid #ccc;
  apadding: 5px;
  margin-bottom: 5px;
  background-color: #FFFFE0;
    border-radius: 10px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
     aborder-radius: 5px;
   

    
}
  
  .achat{
    position: absolute;
    bottom: 0;
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
      
      
      
      
      <div class="news">
      <h5>01.03.2024</h5>
      <h2>Aktualizacja Broken Cello app!</h2>
      <p>Stoper - obecnie można nim mierzyć czas, wynik należy wpisać manualnie. Trwają prace nad pozostałymi funkcjonalnościami.<br><br>
        Wykres miesięczny w zakładce Statystyki.</p>
    </div>
      
      
      
     
      
      
    </div>
  </div>
      


    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
