<?php
// Ustawienie czasu ważności sesji na 7 dni
$lifetime = 604800; // 7 dni w sekundach
session_set_cookie_params($lifetime);
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: login.php");
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
    <title>admin panel</title>
    <link rel="stylesheet" href="admin/styleadmin.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <header>
        <h1>Historia</h1>
    </header>
     <nav>
       <a href="home.php" class="image-link"><img src="admin/home.png" alt=""></a>
       <a href="metronome.php" class="image-link"><img src="admin/metronome.png" alt=""></a>
       <a href="tuner.php" class="image-link"><img src="admin/tuner.png" alt=""></a>
       <a href="addexercise.php" class="image-link"><img src="admin/add.png" alt=""></a>
       <a href="statistics.php" class="image-link"><img src="admin/chart.png" alt=""></a>
       <a href="user.php" class="image-link"><img src="admin/user.png" alt=""></a>
    </nav>
    <div class="container">
      
      
      
         
      
      <h3>Mój dzienny czas ćwiczeń - statystyki historia</h3>

      
      <?php
// Otwieramy plik danych
$file = fopen("admin/data.txt", "r");

// Inicjujemy tablicę, która będzie przechowywać sumę liczb oraz datę dla każdego dnia
$sums_by_day = array();

// Odczytujemy plik linia po linii
while (!feof($file)) {
    $line = fgets($file); // Odczytujemy jedną linię z pliku
    $data = explode(",", $line); // Rozdzielamy dane po przecinkach

    // Sprawdzamy, czy linia zawiera wszystkie elementy: imię, liczba oraz data
    if (count($data) == 3) {
        $name = trim($data[0]);
        $number = intval(trim($data[1]));
        $date = trim($data[2]);

        // Rozdzielamy datę na części: dzień, miesiąc, rok
        $date_parts = explode(" ", $date);
        $day = intval($date_parts[0]);

        // Tworzymy pełną datę
        $full_date = implode(" ", array_slice($date_parts, 0, 3));
 if ($data[0] === $username) {
           
        
        // Dodajemy liczbę i datę do sumy dla danego dnia
        if (isset($sums_by_day[$day])) {
            $sums_by_day[$day]['sum'] += $number;
            $sums_by_day[$day]['date'] = $full_date;
        } else {
            $sums_by_day[$day] = array('sum' => $number, 'date' => $full_date);
        }}
    }
}
   

// Zamykamy plik
fclose($file);

    ?>  
      
      
            <canvas id="myChart3" width="800" height="400"></canvas>

<script>
    // Dane sumaryczne
    var sumsByDay = <?php echo json_encode($sums_by_day); ?>;

    // Przygotowanie danych do wykresu
    var labels = [];
    var data = [];
    for (var day in sumsByDay) {
        if (sumsByDay.hasOwnProperty(day)) {
            labels.push("Dzień " + day);
            data.push(sumsByDay[day]['sum']);
        }
    }
  
  
  
  
        // Konwertuj sumę czasu z minut na godziny
       // for (var i = 0; i < data.length; i++) {
        //    var hours = data[i] / 60;
        //    data[i] = hours.toFixed(2); // Zaokrąglenie do dwóch miejsc po przecinku
        //}
  
  
  
  

    // Utworzenie wykresu liniowego
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Mój dzienny czas ćwiczeń',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
      
      
        <?php  
// Wyświetlamy sumę liczb i datę dla każdego dnia, konwertując sumę minut na godziny i minuty
foreach ($sums_by_day as $day => $data) {
    $total_minutes = $data['sum'];
    $hours = floor($total_minutes / 60);
    $minutes = $total_minutes % 60;
    echo "$data[date] - $hours godzin $minutes minut <br>";
 
}
?>
      

      
      
      
      
      
      
      
        
  </div>
    <footer>
        &copy; 2024 The Broken Cello Quartet
    </footer>
  
</body>
</html>
