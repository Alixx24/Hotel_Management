loginBtn = document.getElementById("btnLogin");
inputLogin = document.getElementById("inputEmail");

loginBtn.addEventListener('mouseover', function() {
    this.style.background = "#4d0099";
    this.style.color = "white";
    this.style.height = "52px";
});

loginBtn.addEventListener('mouseleave', function() {
    this.style.background = "";
    this.style.color = "white";
    this.style.height = "";
});

inputLogin.addEventListener('keypress', function() {
    this.style.background = "#4d0099";
    this.style.color = "white";
    this.style.height = "52px";
});

inputLogin.addEventListener('keydown', function() {
    this.style.background = "";
    this.style.color = "black";
    this.style.height = "";
    
});




