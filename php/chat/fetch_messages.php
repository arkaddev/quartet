<?php
$file = fopen("messages.txt", "r");
while(!feof($file)) {
   // echo fgets($file) . "<br>";
  
  // Wyświetl każdą wiadomość w odpowiednim formacie HTML

    echo '<div class="message">' . fgets($file) . '</div>';

}
fclose($file);
?>

