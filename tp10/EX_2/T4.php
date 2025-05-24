<?php
require 'T1.php';
session_start();


if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM exercice WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $exercice = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$exercice) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Exercice non trouvé'
        ];
        header('Location: T2.php');
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("UPDATE exercice SET titre = ?, auteur = ?, date_creation = ? WHERE id = ?");
        $stmt->execute([
            $_POST['titre'],
            $_POST['auteur'],
            $_POST['date_creation'],
            $_POST['id']
        ]);
        
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => 'L\'exercice a été mis à jour avec succès'
        ];
    } catch (PDOException $e) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Erreur lors de la mise à jour: ' . $e->getMessage()
        ];
    }
    
    header('Location: T2.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'exercice</title>
</head>

<body>
<fieldset>
<legend>Modifier l'exercice</legend>
    
    <form action="T4.php" method="post">
        <input type="hidden" name="id" value="<?php echo $exercice['id']; ?>">
        
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($exercice['titre']); ?>" required>
        <br><br>
            <label for="auteur">Auteur:</label>
            <input type="text" id="auteur" name="auteur" value="<?php echo htmlspecialchars($exercice['auteur']); ?>" required>
        <br><br>
            <label for="date_creation">Date de création:</label>
            <input type="date" id="date_creation" name="date_creation" value="<?php echo $exercice['date_creation']; ?>" required>
        <br><br>
            <input type="submit" value="Enregistrer">
    </form>
</fieldset>
</body>
</html>