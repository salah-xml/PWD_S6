<?php
 
function enregistrer($nom, $message) {
    $date = date("Y-m-d H:i:s");
    $contenu = "$date - $nom: $message\n";
    file_put_contents("message.txt", $contenu, FILE_APPEND);
}
function afficher() {
    if (file_exists("message.txt")) {
        $message = file("message.txt");
        sort($message);  
        foreach ($message as $msg) {
            echo nl2br(htmlspecialchars($msg));
        }
    } else {
        echo "Aucun message enregistré.";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $message = $_POST['message'];
    enregistrer($nom, $message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Message</title>
</head>
<body>
    <h1>Laissez un message</h1>
    <form method="POST">
        <label >Nom:</label><br>
        <input type="text" name="nom" required><br><br>
        <label >Message:</label><br>
        <textarea name="message" required></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Messages enregistrés :</h2>
    <div>
        <?php afficher(); ?>
    </div>
</body>
</html>