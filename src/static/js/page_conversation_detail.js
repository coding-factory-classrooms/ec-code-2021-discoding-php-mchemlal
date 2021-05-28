const contentInput = document.getElementById("content");

contentInput.addEventListener("keyup", function(event) {
    if (event.code === 13) {
        event.preventDefault();
        document.getElementById("sendMessage").click();
    }
});

$(document).ready(function() {
    setInterval(function() {
        $("#refresh").load(window.location.href + " #refresh");
    }, 5000); //refresh every 5 seconds
});