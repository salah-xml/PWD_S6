<?php
session_start();

if (!isset($_SESSION['CONNECT']) || $_SESSION['CONNECT'] != 'OK') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Hello <?php echo htmlspecialchars($_SESSION['login']); ?></h1>
    <a href="validation.php?afaire=deconnexion" >Déconnexion</a>
</body>
</html>