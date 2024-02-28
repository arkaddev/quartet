function sendMessage() {
 
  
  var username = "<?php echo $username; ?>";
    var message = document.getElementById("message").value;
    message = username +": "+ message;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").value = "";
        }
    };
    xmlhttp.open("GET", "php/chat/send_message.php?message=" + message, true);
    xmlhttp.send();

 // Pobranie elementu chat-box za pomocą jego identyfikatora
var chatBox = document.getElementById('chat-box');

// Ustawienie wartości scrollTop na maksymalną wartość, co spowoduje przesunięcie paska przewijania na dół
chatBox.scrollTop = chatBox.scrollHeight;

}

function fetchMessages() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat-box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "php/chat/fetch_messages.php", true);
    xmlhttp.send(); 
}

setInterval(fetchMessages, 1000); // Pobierz wiadomości co sekundę
