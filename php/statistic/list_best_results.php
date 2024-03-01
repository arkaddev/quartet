<?php

// Najlepsze wyniki
// Najdłuższe dzienne ćwiczenie

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
        if(isset($suma_czasu_miesiac[$data_format][$imie])) {
            $suma_czasu_miesiac[$data_format][$imie] += $liczba_minut;
        } else {
            $suma_czasu_miesiac[$data_format][$imie] = $liczba_minut;
        }
    }
}

// Zamknij plik
fclose($file);
$czasmax=0;
$imiemax="";
      $datamax=0;
      $minutmax=0;
// Wyświetl wyniki dla każdej daty
foreach ($suma_czasu_miesiac as $data => $wyniki) {
 
    // Posortuj wyniki malejąco
    arsort($wyniki);
    
    $miejsce = 1;
    foreach ($wyniki as $imie => $czas) {
    
      if($czas>$czasmax){
         $czasmax = $czas;
        $imiemax = $imie;
        $minutmax= $minut;
        $datamax = $data;
         
      }
      
        $miejsce++;
    }
  

}
      echo "$imiemax - $czasmax minut, Data: $datamax<br>";
?>
    
