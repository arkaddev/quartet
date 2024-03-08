<?php
            // Wczytaj wszystkie linie z pliku tekstowego do tablicy $lines
            $lines = file("data/data.txt", FILE_IGNORE_NEW_LINES);
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
                if(count($parts) == 3 || count($parts) == 4) {
                    // Przypisz dane do zmiennych
                    $imie = $parts[0];
                    $liczba = $parts[1];
                    $data = $parts[2];
                    // Wyświetl dane w formie listy
   

$currentDate = date("d-m-Y"); // Pobierz datę w formacie RRRR-MM-DD
$date = date("d-m-Y", strtotime($data)); // Konwersja daty na znacznik czasowy i ponowne sformatowanie tylko daty

if($currentDate==$date){
echo "<strong>$imie</strong> ćwiczył <strong>$liczba</strong> minut w dniu $data<br><br>";
}
else{
$color = "gray";

   
echo "<p style='color: $color;'><strong>$imie</strong> ćwiczył <strong>$liczba</strong> minut w dniu $data<br></p>";
}

 
                }
            }
        ?>
