<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 4</title>
</head>
<body>
    <form  method="post">

     <label>Entre Nom:</label><br>
    <input type="text" name="nom"><br>
    <label>Entre le mot de passe:</label><br>
    <input type="password" name="passe"><br>
    <br>
    <button type="submit" name="connexion">Connexion</button>
    </form>
<?php
session_start();
if (isset($_POST['connexion'])) {
   $name= 'daoud';
   $password= "123" ;
   $nom= $_POST['nom'];
    $passe= $_POST['passe'];

  if ($nom==$name && $passe==$password ) {
    $_SESSION['utilisateur']=$nom;
     header('location: bienvenue.php');
     exit();
  }else{
    $erreur = "Nom ou Le mot de passe incorrects.";
  }
}
?>
<?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
</body>
</html>