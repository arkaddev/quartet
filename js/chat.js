var username;

document.addEventListener("DOMContentLoaded", function() {
    // Pobranie wartości zmiennej z atrybutu data
    var dataElement = document.getElementById("data");
    username = dataElement.getAttribute("data-username");

    // Wyświetlenie wartości zmiennej w konsoli
    //console.log("Username w JavaScript: " + username);

    // Wyświetlenie wartości zmiennej w elemencie HTML
   // document.body.innerHTML += "<p>Username w JavaScript: " + username + "</p>";
});




function sendMessage() {
 
if (username) {
   
    //var username = "<?php echo $username; ?>";
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
   
} else {
      window.location.href = "login.php";
}

  
  
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

// Zmienna przechowująca identyfikator interwału
//var intervalId;

// Funkcja do rozpoczęcia cyklicznego pobierania wiadomości
//function startF() {
//    intervalId = setInterval(fetchMessages, 1000);
//}

// Funkcja do zatrzymania cyklicznego pobierania wiadomości
//function stopF() {
//    clearInterval(intervalId);
//}
