<?php
// Tworzymy tablicę, aby przechowywać sumy minut dla każdego imienia
$sums = array();

// Tablica do przechowywania liczby wystąpień wyniku 0 dla każdego imienia
$zeroCounts = array();

// Tablica do przechowywania sum wyników dla każdego dnia osobno i dla każdego imienia osobno
$sumsPerDayAndName = array();

// Tablica do przechowywania liczby wystąpień wyniku mniejszego niż 60 dla każdego imienia
$underSixtyCounts = array();

$points = array();


// Otwieramy plik tekstowy
$file = fopen("data/data.txt", "r");

// Przechodzimy przez każdą linię w pliku
while(!feof($file)) {
    $line = fgets($file);
    
 
    // Rozdzielamy linię na części po przecinkach
    $parts = explode(",", $line);
     // Jeśli liczba części wynosi 3 (czyli mamy wszystkie oczekiwane dane)
  
  $miesiac = date('m-Y'); // Pobierz miesiąc z daty
              
  $datetime = $parts[2]; // $parts[2] zawiera datę i czas
  $timestamp = strtotime($datetime); // Konwertuj datę i czas na znacznik czasu
  $miesiac_i_rok = date("m-Y", $timestamp); // Formatuj miesiąc i rok
  
  
  if(count($parts) == 3&& $miesiac_i_rok==$miesiac ) { // Jeśli liczba części wynosi 3 (czyli mamy 

  
             
    // Pobieramy imię, minutę i datę
    $name = trim($parts[0]);
    $minutes = intval(trim($parts[1]));
    $datetime = trim($parts[2]);
    
    // Wyodrębniamy tylko datę z godziny
    $date = date("Y-m-d", strtotime($datetime));
                  
                  
                  // Jeśli istnieje już wpis dla tego imienia, dodajemy minuty
    if(isset($sums[$name])) {
        $sums[$name] += $minutes;
    } else {
        // Jeśli nie ma jeszcze wpisu dla tego imienia, tworzymy go
        $sums[$name] = $minutes;
    }
     
                  
                  
                  
                  // Jeśli nie ma jeszcze wpisu dla tego imienia, tworzymy go
    if(!isset($zeroCounts[$name])) {
        $zeroCounts[$name] = 0;
    }
    
    // Jeśli liczba minut wynosi 0, zwiększamy licznik dla danego imienia
    if($minutes === 0) {
        $zeroCounts[$name]++;
    }
                  
                  
                
   
  // Jeśli istnieje już wpis dla tego imienia i daty, dodajemy minuty
    if(isset($sumsPerDayAndName[$name][$date])) {
        $sumsPerDayAndName[$name][$date] += $minutes;
    } else {
        // Jeśli nie ma jeszcze wpisu dla tego imienia i daty, tworzymy go
        $sumsPerDayAndName[$name][$date] = $minutes;
    }               
}
  
  
  
  
}       
                  
                  
     
  
/*

// Zamykamy plik
fclose($file);
echo "<br><br>";
// Wyświetlamy wyniki
foreach($sums as $name => $totalMinutes) {
    echo "Imię: $name, Suma minut: $totalMinutes\n<br>";
}
 echo "<br><br>";

foreach($zeroCounts as $name => $count) {
    echo "Imię: $name, Liczba wystąpień wyniku 0: $count\n<br>";
 
}
echo "<br><br>";

// Wyświetl wyniki
                  
foreach ($sumsPerDayAndName as $name => $dates) {
    echo "Suma minut dla $name:\n";
    foreach ($dates as $date => $minutes) {
        echo "- Data: $date, Minuty: $minutes\n";
    }
    echo "\n";
}
 echo "------------------------------";
*/
 
 foreach ($sumsPerDayAndName as $name => $dates) {
   foreach ($dates as $date => $minutes) {
    
      if(!isset($underSixtyCounts[$name])) {
        $underSixtyCounts[$name] = 0;
    }
    
    // Jeśli liczba minut wynosi 0, zwiększamy licznik dla danego imienia
    if($minutes < 60) {
        $underSixtyCounts[$name]++;
    }
    }}


//obliczenia

foreach($sums as $name => $totalMinutes) {
          if(!isset($points[$name])) {
        $points[$name] = 0;
    }
          $points[$name] = $totalMinutes/10; // 1 punkt to 10 minut
  //echo "$name - $points[$name] punktów\n<br>";
}   


foreach($zeroCounts as $name => $count) {
  if($count>0){
    $points[$name] = $points[$name]- $count*10; // za dzien przerwy odejmij 10 punktow
    
} //echo "$name - $points[$name] punktów\n<br>";
}

foreach($underSixtyCounts as $name => $count) {
  if($count>0){
    $points[$name] = $points[$name]- $count*3; // za cwiczenie krotsze niz 60 min odejmij 3 punkty
    
} //echo "$name - $points[$name] punktów\n<br>";
}

// Posortuj tablicę sumy_uzytkownikow według wartości czasu (malejąco)
            arsort($points);
$miejsce = 1; // Licznik miejsca na liście
echo "<table>";
foreach($points as $name => $totalPoints){
echo "<tr><td>$miejsce. $name</td><td>$totalPoints</td></tr>";
  $miejsce++;
}
echo "</table>";
echo "<br>";
//var_dump($points);             
?>
