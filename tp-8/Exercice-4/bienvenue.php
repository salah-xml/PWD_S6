<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['utilisateur']); ?> !</h1>
    <a href="log.php">Se déconnecter</a>
</body>
</html>