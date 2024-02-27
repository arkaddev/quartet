<?php
$file = fopen("messages.txt", "r");
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
?>

