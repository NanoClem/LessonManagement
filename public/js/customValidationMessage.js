
var login = document.getElementById("login");   // id du champ input "login"

login.oninvalid = function(event) {
    event.target.setCustomValidity("Veuillez saisir une adresse mail valide");
}

// login.addEventListener("keyup", function(event) {
//     if(login.validity.typeMismatch) {
//         login.setCustomValidity("Veuillez saisir un mail valide");
//     } else {
//         login.setCustomValidity("");
//     }
// });