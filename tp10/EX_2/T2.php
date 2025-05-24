<?php
require 'T1.php';
session_start();


$message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
unset($_SESSION['message']);

$stmt = $pdo->query("SELECT * FROM exercice ORDER BY date_creation DESC");
$exercices = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des exercices</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    
    
    <?php if ($message): ?>
        <p class="<?php echo $message['type']; ?>"><?php echo $message['text']; ?></p>
    <?php endif; ?>
    
    <fieldset>
    <legend>Ajouter un exercice</legend>
    <form action="T3.php" method="post">
        
        <label for="titre">Titre de l'exercice:</label>
            <input type="text" id="titre" name="titre" required><br><br>
       
        <label for="auteur">Auteur:</label>
            <input type="text" id="auteur" name="auteur" required><br><br>
        
        <label for="date_creation">Date de création:</label>
            <input type="date" id="date_creation" name="date_creation" required><br><br>
       
            <input type="submit" value="Envoyer">
        </div>
    </form>
    </fieldset>
                   <br><br>
 <table>
        <thead>
            <tr>
    <th  bgcolor="orange">ID</th>
    <th  bgcolor="orange">Titre</th>
    <th  bgcolor="orange">Auteur</th>
    <th  bgcolor="orange">Date</th>
    <th bgcolor="orange">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($exercices as $exercice): ?>
                
                <tr>
                <td bgcolor="Aqua"><?php echo $exercice['id']; ?></td>
                <td bgcolor="Aqua"><?php echo htmlspecialchars($exercice['titre']); ?></td>
                <td bgcolor="Aqua"><?php echo htmlspecialchars($exercice['auteur']); ?></td>
                <td bgcolor="Aqua"><?php echo $exercice['date_creation']; ?></td>
                <td bgcolor="Aqua">
                    <a href="T4.php?id=<?php echo $exercice['id']; ?>">Modifier</a> |
                    <a href="T5.php?id=<?php echo $exercice['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet exercice?')">Supprimer</a>
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

 </table>
</body>
</html>