/* let prenom = "Fabio";
alert(`Hello ${prenom} !`);
*/
/*
let age = prompt("Quel âge avez vous ?");

function verifAge() {
    if (age >= 18) {

        alert("Vous êtes majeur");
    } else {
        alert("Vous êtes mineur");
    }
}
*/

function isMessageSet() {

    let nom = document.forms["contact"]["lastName"].value;
    var message = document.forms["contact"]["message"].value;
    if(message == null || message =="" && nom =="" || nom == null){
        alert("Votre message et vide inconnu");
    }
    else if(message == null || message == ""){
        alert(`${nom} ton message est vide`);
    }

    return false;
}