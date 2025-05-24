<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
</head>
<body>
    <form method="POST">
    <label>Nom:</label><br>
    <input type="text" name="nom"><br>
    <label>Email:</label><br>
    <input type="email" name="email"><br>
    <label>Message:</label><br>
    <textarea name="message"></textarea><br>
     <button name="envoyer">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['envoyer'])) {
         $nom = $_POST['nom'];
          $email = $_POST['email'];
          $message = $_POST['message'];
         if (!empty($nom) && !empty($email) && !empty($message)){
            echo "L'opération a été un succès.";
         }else{
            echo "Toutes les options doivent être remplies.";
         }
    }
    ?>
</body>
</html>