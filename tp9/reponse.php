<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titre = isset($_POST['titre']) ? strip_tags(trim($_POST['titre'])) : '';
    $nom = isset($_POST['nom']) ? strip_tags(trim($_POST['nom'])) : '';
    $prenom = isset($_POST['prenom']) ? strip_tags(trim($_POST['prenom'])) : '';
    $annee = isset($_POST['annee']) ? strip_tags(trim($_POST['annee'])) : '';
    $identifiant = isset($_POST['identifiant']) ? strip_tags(trim($_POST['identifiant'])) : '';
    $mdp = isset($_POST['mdp']) ? strip_tags(trim($_POST['mdp'])) : '';
    $sexe = isset($_POST['sexe']) ? strip_tags(trim($_POST['sexe'])) : '';
    $debutant = isset($_POST['debutant']) ? 'Oui' : 'Non';

   
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Réponse</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
    <div class='container'>
        <h1>Bonjour, $titre $prenom $nom</h1>";

    echo "<p><strong>Année de naissance :</strong> $annee</p>";
    echo "<p><strong>Identifiant :</strong> $identifiant</p>";
    echo "<p><strong>Mot de passe :</strong> ********</p>";
    echo "<p><strong>Sexe :</strong> $sexe</p>";
    echo "<p><strong>Débutant en PHP :</strong> $debutant</p>";

    echo "<p>Merci pour votre inscription !</p>";
    echo "<a href='index.html'>Retour au formulaire</a>";
    echo "</div></body></html>";

} else {
    
    echo "<p>Erreur : Formulaire non soumis.</p>";
}
?>