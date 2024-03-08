<?php

// Bilans dzienny

// Inicjalizacja pustej tablicy dla przechowywania sumy czasu dla każdego imienia w każdym miesiącu
$suma_czasu_miesiac = array();

// Otwórz plik tekstowy do odczytu
$file = fopen("data/data.txt", "r");

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
var colors = ['#808080','#FFC0CB','#FFD700', '#000000'];
  for (var name in chartData) {
    var data = [];
    for (var date in chartData[name]) {
      data.push(chartData[name][date]);
    }

    chartDatasets.push({
      label: name,
      data: data,
      fill: false,
      borderColor: colors
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
      
