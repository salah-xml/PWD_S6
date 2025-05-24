


const nombreMystere = Math.floor(Math.random() * 10) + 1;
let tentative = 0;
let devine = false;

while (!devine) {
   
    let reponse = prompt("Devinez le nombre entre 1 et 10 :");

   
    if (reponse === null) {
        alert("Partie abandonnée !");
        break;
    }

   
    let nombre = parseInt(reponse);

  
    if (isNaN(nombre) || nombre < 1 || nombre > 10) {
        alert("Veuillez entrer un nombre valide entre 1 et 10.");
        continue;
    }

    tentative++;

   
    if (nombre < nombreMystere) {
        alert("C'est plus !");
    } else if (nombre > nombreMystere) {
        alert("C'est moins !");
    } else {
        alert(`Félicitations ! Vous avez trouvé le nombre exact.`);
        devine = true;
        document.getElementById("resultat").innerHTML = 
            ` Félicitations ! `;
    }
}
