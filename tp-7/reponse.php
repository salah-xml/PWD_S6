<?php
if ( isset($_POST["envoyer"])) {
    echo "<h2>Informations reçues :</h2>";
    echo "<strong>Prénom :</strong> " . htmlspecialchars($_POST['prenom']) . "<br>";
    echo "<strong>Nom :</strong> " . htmlspecialchars($_POST['nom']) . "<br>";
    echo "<strong>Date de naissance :</strong> " . htmlspecialchars($_POST['date_naissance']) . "<br>";
    echo "<strong>ID :</strong> " . htmlspecialchars($_POST['identifiant']) . "<br>";
    echo "<strong>Mot de passe :</strong> " . htmlspecialchars($_POST['motdepasse']) . "<br>";
    echo "<strong>Sexe :</strong> " . htmlspecialchars($_POST['sexe']) . "<br>";
    
    if (isset($_POST['debut_php'])) {
        echo "<strong>Débutant en PHP :</strong> Oui<br>";
    } else {
        echo "<strong>Débutant en PHP :</strong> Non<br>";
    }
} else {
    echo "Aucune donnée reçue.";
}
?>