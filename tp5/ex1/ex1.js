
let nombre1 =  prompt("Veuillez saisir le premier nombre :");
let nombre2 = prompt("Veuillez saisir le deuxième nombre :");


if (isNaN(nombre1) || isNaN(nombre2)) {
    console.error("Erreur : Veuillez saisir des nombres valides.");
} else {
    
    let somme = nombre1 + nombre2;
    let difference = nombre1 - nombre2;
    let produit = nombre1 * nombre2;
    let quotient = nombre2 !== 0 ? nombre1 / nombre2 : "Indéfini (division par zéro)";

    
    console.log("Somme : " + somme);
    console.log("Différence : " + difference);
    console.log("Produit : " + produit);
    console.log("Quotient : " + quotient);
}