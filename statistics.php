<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.html");
    exit();
}

// Odczytaj nazwę użytkownika z sesji
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Cello app</title>
    <link rel="stylesheet" href="admin/styleadmin.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>Statystyki</h1>
    </header>
  <nav>
       <a href="admin.php" class="image-link"><img src="admin/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/chart.png" alt=""></a>
       <a href="#" class="image-link"><img src="admin/user.png" alt=""></a>
    </nav>
    <div class="container">
    
   <?php
            // Wczytaj wszystkie linie z pliku tekstowego do tablicy $lines
            $lines = file("admin/data.txt", FILE_IGNORE_NEW_LINES);
            // Jeśli liczba linii jest większa niż 10, ogranicz ją do ostatnich 10 linii
            if (count($lines) > 10) {
                $lines = array_slice($lines, -10, 10);
            }
            // Odwróć kolejność linii w tablicy
            $lines = array_reverse($lines);
            // Przejdź przez każdą linię w odwróconej kolejności
            foreach ($lines as $line) {
                // Podziel linię na części za pomocą przecinka
                $parts = explode(',', $line);
                // Jeśli liczba części wynosi 3 (czyli mamy wszystkie oczekiwane dane)
                if(count($parts) == 3) {
                    // Przypisz dane do zmiennych
                    $imie = $parts[0];
                    $liczba = $parts[1];
                    $data = $parts[2];
                    // Wyświetl dane w formie listy
                    echo "<strong>$imie</strong> ćwiczył <strong>$liczba</strong> minut w dniu $data<br><br>";
                }
            }
        ?>

        <h3 style="text-align: center;">Statystyki ogólne</h3>
      
       <?php
            // Inicjalizacja pustej asocjacyjnej tablicy dla przechowywania sum czasu dla każdego użytkownika
            $sumy_uzytkownikow = array();
            
            // Wczytaj wszystkie linie z pliku tekstowego do tablicy $lines
            $lines = file("admin/data.txt", FILE_IGNORE_NEW_LINES);
            
            // Przejdź przez każdą linię w tablicy
            foreach ($lines as $line) {
                // Podziel linię na części za pomocą przecinka
                $parts = explode(',', $line);
                
                // Jeśli liczba części wynosi 3 (czyli mamy wszystkie oczekiwane dane)
                if(count($parts) == 3) {
                    // Przypisz dane do zmiennych
                    $imie = $parts[0];
                    $czas_w_minutach = (int)$parts[1]; // Konwersja na liczbę całkowitą
                    
                    // Jeśli użytkownik jest już w tablicy sum, dodaj do niego aktualny czas
                    // W przeciwnym razie, dodaj nowy klucz z aktualnym czasem
                    if(isset($sumy_uzytkownikow[$imie])) {
                        $sumy_uzytkownikow[$imie] += $czas_w_minutach;
                    } else {
                        $sumy_uzytkownikow[$imie] = $czas_w_minutach;
                    }
                }
            }
            
            // Posortuj tablicę sumy_uzytkownikow według wartości czasu (malejąco)
            arsort($sumy_uzytkownikow);
            
            // Licznik miejsca na liście
            $miejsce = 1;
          ?>
       <canvas id="myChart"></canvas>

    <script>
        // Dane użytkowników i ich sumy czasu
        var usersData = <?php echo json_encode($sumy_uzytkownikow); ?>;
        var labels = Object.keys(usersData);
        var data = Object.values(usersData);

        // Konwertuj sumę czasu z minut na godziny
        for (var i = 0; i < data.length; i++) {
            var hours = data[i] / 60;
            data[i] = hours.toFixed(2); // Zaokrąglenie do dwóch miejsc po przecinku
        }

        // Konfiguracja wykresu
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Suma czasu (godziny)',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    
      
      <?php
      
            // Wyświetl sumy czasu dla każdego użytkownika w kolejności malejącej
            foreach ($sumy_uzytkownikow as $imie => $suma) {
                $godziny = floor($suma / 60);
                $minuty = $suma % 60;
                echo "$miejsce. $imie - Suma czasu: $godziny godzin $minuty minut<br>";
                $miejsce++;
            }
        ?>
      
             
      
          <h3 style="text-align: center;">Bilans dzienny</h3>
      
      
      <?php
// Inicjalizacja pustej tablicy dla przechowywania sumy czasu dla każdego imienia w każdym miesiącu
$suma_czasu_miesiac = array();

// Otwórz plik tekstowy do odczytu
$file = fopen("admin/data.txt", "r");

// Przejdź przez każdą linię w pliku tekstowym
while(!feof($file)) {
    // Odczytaj linię
    $line = fgets($file);
    
    // Podziel linię na części, używając przecinka jako separatora
    $parts = explode(',', $line);
    
    // Jeśli liczba części wynosi 3 (czyli mamy wszystkie oczekiwane dane)
    if(count($parts) == 3) {
        // Przypisz dane do zmiennych
        $imie = $parts[0];
        $liczba_minut = (int)$parts[1]; // Konwersja na liczbę całkowitą
        $data = strtotime($parts[2]); // Konwersja daty na znacznik czasu
        
        // Pobierz datę z formatu timestamp
        $data_format = date('Y-m-d', $data);
        
        // Dodaj czas do sumy czasu dla danego imienia w danym miesiącu
        if(isset($suma_czasu_miesiac[$imie][$data_format])) {
            $suma_czasu_miesiac[$imie][$data_format] += $liczba_minut;
        } else {
            $suma_czasu_miesiac[$imie][$data_format] = $liczba_minut;
        }
    }
}

// Zamknij plik
fclose($file);
?>

             <canvas id="myChart5" width="800" height="400"></canvas>

<script>
  
    
  // Dane do wykresu
  var chartData = <?php echo json_encode($suma_czasu_miesiac); ?>;

  // Przygotuj dane dla Chart.js
  var chartLabels = Object.keys(chartData[Object.keys(chartData)[0]]);
  var chartDatasets = [];

  for (var name in chartData) {
    var data = [];
    for (var date in chartData[name]) {
      data.push(chartData[name][date]);
    }

    chartDatasets.push({
      label: name,
      data: data,
      fill: false,
      borderColor: getRandomColor()
    });
  }

  // Generuj losowy kolor
  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }

  // Rysuj wykres za pomocą Chart.js
  var ctx = document.getElementById('myChart5').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: chartLabels,
      datasets: chartDatasets
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
  </script>
      
      
      
      
</body>
</html>
