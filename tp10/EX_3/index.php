<?php
require_once 'Database.php';
require_once 'Guerrier.php';
require_once 'GestionCombat.php';


$message = '';
$guerriers = GestionCombat::listerGuerriersVivants();


if (isset($_POST['creer'])) {
    $nom = trim($_POST['nom'] ?? '');
    if (!empty($nom)) {
        if (GestionCombat::creerGuerrier($nom)) {
            $message = "Guerrier $nom créé avec succès!";
            $guerriers = GestionCombat::listerGuerriersVivants();
        } else {
            $message = "Erreur: le nom $nom est déjà pris ou invalide";
        }
    }
}


    if (isset($_POST['combattre'])) {
    $guerrier1 = $_POST['guerrier1'] ?? '';
    $guerrier2 = $_POST['guerrier2'] ?? '';
    
    if ($guerrier1 && $guerrier2 && $guerrier1 !== $guerrier2) {
        $resultat = GestionCombat::jouerTour($guerrier1, $guerrier2);
        
        if (is_array($resultat)) {
            $message = $resultat['message'] . "<br>" . 
                       $resultat['guerrier1'] . "<br>" . 
                       $resultat['guerrier2'];
        } else {
            $message = $resultat;
        }
        
        $guerriers = GestionCombat::listerGuerriersVivants();
    } else {
        $message = "Veuillez sélectionner deux guerriers différents";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu de Combat</title>
</head>
<body>
    
    <fieldset>
    <legend><h1 style="color:rgb(4, 151, 219);">Jeu de Combat</h1></legend>
    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <h2 style="color:rgb(219, 4, 4);" >Créer un nouveau guerrier</h2>
    <form method="post">
        
            <label>Nom: <input type="text" name="nom" required></label>
        
        <button type="submit" name="creer">Créer</button>
    </form>
    
    <h2 style="color:rgb(219, 4, 4);">Combattre</h2>
    <form method="post">
        
            <label>Guerrier 1:
                <select name="guerrier1" required>
                <?php foreach ($guerriers as $g): ?>
                <option value="<?= htmlspecialchars($g->getNom()) ?>">
                   <?= htmlspecialchars($g->getNom()) ?> (<?= $g->getDegats() ?>%)
                </option>
                <?php endforeach; ?>
                </select>
                 </label>
        
        
                       <label>Guerrier 2:
                        <select name="guerrier2" required>
                        <?php foreach ($guerriers as $g): ?>
                        <option value="<?= htmlspecialchars($g->getNom()) ?>">
                            <?= htmlspecialchars($g->getNom()) ?> (<?= $g->getDegats() ?>%)
                        </option>
                        <?php endforeach; ?>
                        </select>
            </label>
        
        <button type="submit" name="combattre">Combattre</button>
    </form>
    
    
    <h2 style="color:rgb(219, 4, 4);">Guerriers vivants</h2>
    <ul>
               <?php foreach ($guerriers as $g): ?>
            <li><?= htmlspecialchars($g) ?></li>
              <?php endforeach; ?>
    </ul>
    </fieldset>
</body>
</html>