window.onload = preparePage();
var toggle = false;







function preparePage() {

   
    var spotifyButton = document.getElementById("Spotify");
   

    spotifyButton.onclick = function () {
        Spotify();
    }


   

    
}

function Spotify() {
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function () {
      
        var text = document.getElementsByClassName("iframe-wrapper");

        text[0].innerHTML = this.responseText;
    }
    if (toggle == false) {
        xhttp.open("GET", "Spotify.txt", true);
        xhttp.send();
        toggle = true;
    }
    else {
        xhttp.open("GET", "Youtube.txt", true);
        xhttp.send();
        toggle = false;
    }
}