
var login = document.getElementById("login");   // id du champ input "login"

login.oninvalid = function(event) {
    event.target.setCustomValidity("Veuillez saisir une adresse mail valide");
}