<?php
if(isset($_GET['message'])) {
    $message = $_GET['message'];
    $file = fopen("messages.txt", "a");
    fwrite($file, $message . PHP_EOL);
    fclose($file);
}
?>

