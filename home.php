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
  <script src="js/chat.js" defer></script>
  <style>
   @media only screen and (max-width: 600px) {
     
   body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0; 
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
    max-width: 20px; /* Ustaw maksymalną szerokość obrazka */
    max-height: 20px; /* Ustaw maksymalną wysokość obrazka */
    filter: invert(100%);
  }
  
  .right-item {
        position: relative;
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
    
    

  
  
    
  .left-container{
     display: none;
}
  
  
  
  .middle-container {
    aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    margin-left: auto; /* Ustawia drugi kontener na środku */
    margin-right: auto;
    margin-top: 20px;
    
    flex-grow: 1; /* Środkowy kontener zajmie całą dostępną przestrzeń */
           
    
    
    padding: 20px;
    
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    
}
  
   .right-container {
    display: none;
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
    position: fixed;
    bottom: 0;
    width: 100%;
}
  
    
  #chat-box{
  
   top: 0;
    height: 250px; /* Wysokość */
background-color: #f9f9f9;
        color: black;
        padding: 20px;
  overflow: auto;
    margin: 10px;
   border: 1px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    border-radius: 5px;
  }
  
  
  
     
     
    }

@media only screen and (min-width: 601px) {

   body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
   
     
        amin-height: 100vh; /* Minimalna wysokość strony, aby stopka zawsze była na dole */
        aposition: relative; /* Ustawia strony jako referencję dla absolutnie pozycjonowanej stopki */
   
   
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
  border-bottom: 2px solid silver; /* Podkreślenie w kolorze żółtym */
 
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
    
    flex-grow: 1; /* Środkowy kontener zajmie całą dostępną przestrzeń */
           
    
    
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
    position: fixed;
    bottom: 0;
    width: 100%;
}
  
  
  .chat-container {
    position: fixed;
    bottom: 39px ;
    
    width: 300px; /* Szerokość */
    height: 450px; /* Wysokość */
    margin-left: 20px;
    
    aborder: 2px solid #000; /* Dodaj obramowanie, jeśli jest to potrzebne */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  
    background-color: #f9f9f9;
    padding: 10px;
   
    
}
  
  #chat-box {
    position: absolute;
    margin-top: 15px;
    height: 85%;
     width: 300px; /* Szerokość */
    overflow: auto;
    abackground-color: #FFE4E1;   
    }
  
  .chat-input-button{
    position: absolute;
    bottom: 10px;
  }
    
  .chat-message {
  border: 1px solid #ccc;
  padding: 5px;
  margin: 5px;
  background-color: #728FCE;
  border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  

}
    #minimalization {
        position: absolute;
        top: 5px;
        right: 15px;
        cursor: pointer;
    }
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
  </script>
  
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
      
      
      
      
      <div class="news">
      <h5>01.03.2024</h5>
      <h2>Aktualizacja Broken Cello app!</h2>
      <p>Stoper - obecnie można nim mierzyć czas, wynik należy wpisać manualnie. Trwają prace nad pozostałymi funkcjonalnościami.<br><br>
        Wykres miesięczny w zakładce Statystyki.</p>
    </div>
      
      
      
      <div class="news">
      <h5>29.02.2024</h5>
      <h2>Podsumowanie miesiąca luty 2024!</h2>
      <p>Zaprawdę, powstał kwartet w wiosce...<br><br>
        
Na wiejskiej łące, kwartet jak marzenie,<br>
Beata, jak słońce, punktów promienieje!<br>
Arek i Wiktoria, jak wiatr wśród zbóż tańczą,<br>
A Klaudia? Cóż, ta zaczęła od minusa, ale serce ma wciąż pełne jak stodoła zboża w lecie przed żniwami.<br><br>
        
Beata na altówce, jakby walczyła z dżungli 88.2 punktów,<br>
Arek z wolonczelą, ale jak lew na arenie, 57.1 punktów, <br>
Wiktoria na skrzypcach, jak strzała w locie, 45.9 punktów<br>
A Klaudia, ah Klaudia, coś nie tak się jej klei, -9.4 punktów,<br>
ale kto powiedział, że na początku wszystko musi być jak z bajki Królewny Śnieżki?<br><br>
        
Więc do pracy, młodzi muzycy, czas na marsz,<br>
W muzyce świat jest piękniejszy, niechaj w dźwiękach błyszczy blask!<br>
I choć razem jeszcze nie graliśmy, to niech nas to nie zraża,<br>
Bo kiedy zaczniemy, świat będzie trząsł się w tańcu i w radości tańca!<br><br>
    
Beata - 95.2 punktów<br>
Arek - 63.1 punktów<br>
Wiktoria - 48 punktów<br>
Klaudia - -22.4 punktów
        </p>
    </div>
      
      
       <div class="news">
      <h5></h5>
      <h2>TO DO</h2>
      <p>
        <li>wyjazd i ntegracyjny</li>
        <li>bluzy</li>
        <li>statywy</li>
        <li>segregatory</li>
        <li>wizytowki</li></p>
    </div>
      
      
       <div class="news">
      <h5></h5>
      <h2>Co nowego</h2>
      <p>
      <li>04.03.2024 Nowe menu, oraz body strony</li>
      <li>01.03.2024 Statystyki na obecny mieisiac</li>
      <li>29.02.2024 Stoper przy zapisywaniu cwiczen</li>
      <li>28.02.2024 Dodana punktacja</li>
      <li>27.02.2024 Poprawiony uklad graficzny dla czatu</li>
      <li>25.02.2024 Czat</li>
      <li>25.02.2024 Zakladka historia w panelu uzytkownika</li>
      <li>25.02.2024 Nowy formularz logowania oraz poprawione menu usera</li>
      <li>23.02.2024 Nieaktualne wyniki podświetlane w innym kolorze</li>
      <li>22.02.2024 User panel - mozliwosc wylogowania</li>
      <li>21.02.2024 Nuty aktówki - cant help</li>
      <li>21.02.2024 Wykres - mój dzienny czas ćwiczeń</li>
         </p>
    </div>
      
      
      
    </div>
  </div>
      


    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
