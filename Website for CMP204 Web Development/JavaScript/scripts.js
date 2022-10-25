if (sessionStorage.getItem("cookieSeen") == null) {
    cookiesconsent();
}
window.onload = preparePage();
var toggle = false;







function preparePage() {

   
   
    var button = document.getElementById("clicky");

    button.onclick = function () {
        Gallery();
    }

   

}

function cookiesconsent() {

    alert("This webpage uses cookies, by using this site you are consenting to cookies. Check bottom left for more information.");
        sessionStorage.setItem("cookieSeen", "1");
  

}


function Gallery() {


    const gallery = ["./images/wholeband.jpg", "./images/wholebandserious.jpg"];
    var counter = 0;
    
    
    for (; counter < gallery.length; counter++) {

       
        
        if (counter === gallery.length) {
            document.getElementById("imgChange").src = gallery[0];
            break;
        }
       
        document.getElementById("imgChange").src = gallery[counter];
       
    }
    document.getElementsByClassName("Change")[0].innerHTML = "Look at how good they are as a band, they seem so close as friends!";
    }



