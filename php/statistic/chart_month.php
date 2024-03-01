<?php

// Statystyki na dany miesiąc z wykresem
// Na podstawie chart_general.php

            // Inicjalizacja pustej asocjacyjnej tablicy dla przechowywania sum czasu dla każdego użytkownika
            $sumy_uzytkownikow = array();
            
            // Wczytaj wszystkie linie z pliku tekstowego do tablicy $lines
            $lines = file("data/data.txt", FILE_IGNORE_NEW_LINES);
            
            // Przejdź przez każdą linię w tablicy
            foreach ($lines as $line) {
                // Podziel linię na części za pomocą przecinka
                $parts = explode(',', $line);
                
            
              // Pobierz miesiąc z daty
                $miesiac = date('m-Y');
              
              $datetime = $parts[2]; // Załóżmy, że $parts[2] zawiera datę i czas
              $timestamp = strtotime($datetime); // Konwertuj datę i czas na znacznik czasu
              $miesiac_i_rok = date("m-Y", $timestamp); // Formatuj miesiąc i rok
              
              // Jeśli liczba części wynosi 3 (czyli mamy wszystkie oczekiwane dane)
                if(count($parts) == 3 && $miesiac_i_rok==$miesiac) {
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
       
      <canvas id="myChart2"></canvas>

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
        var ctx = document.getElementById('myChart2').getContext('2d');
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