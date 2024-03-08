<?php
$file = fopen("messages.txt", "r");
while(!feof($file)) {

    //echo '<div class="chat-message">' . fgets($file) . '</div>';
  
  $line = fgets($file);
    if ($line !== false && $line !== '') {
        echo '<div class="chat-message">' . $line . '</div>';
    }
  
}
fclose($file);
?>
