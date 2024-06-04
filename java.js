function showPopup(message) {
 
    var popup = document.createElement("div");
    popup.className = "popup";
    popup.textContent = message;

    document.body.appendChild(popup);


    setTimeout(function() {
        popup.style.display = "none"; 
        document.body.removeChild(popup);
    }, 2000); 
}
