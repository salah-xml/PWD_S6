<?php
session_start();
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    
    
    <?php if ($error == 1): ?>
        <p style="color: red;">Veuillez saisir un login et un mot de passe</p>
    <?php elseif ($error == 2): ?>
        <p style="color: red;">Erreur de login/mot de passe</p>
    <?php elseif ($error == 3): ?>
        <p style="color: blue;">Vous avez été déconnecté du service</p>
    <?php endif; ?>
 <br><br><br>
    <fieldset  >
    <form action="validation.php" method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login"><br><br>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
    </fieldset>
</body>
</html>