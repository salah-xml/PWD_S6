<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>
<body>
    <form method="post"> 
    <label>entre la longueur du mot de passe</label><br>
    <input type="number" name="longueur"  required min="4">><br>
    <input type="submit" value="Générer">

</form>
<?php
function  mot_de_passe($longueur) {
    $lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chiffres = '0123456789';
    $speciaux = '!@#$%^&*()-_=+<>?';
    
    $tous = $lettres . $chiffres . $speciaux;
    $motdepasse = '';
    
    for ($i = 0; $i < $longueur; $i++) {
        $motdepasse .= $tous[random_int(0, strlen($tous) - 1)];
    }
    
    return $motdepasse;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $longueur =  $_POST["longueur"];
    
    if ($longueur > 4) {
         $mdp =  mot_de_passe($longueur);
        echo "<p><strong>Mot de passe généré :</strong> $mdp</p>"; } 
     
}
?>
</body>
</html>