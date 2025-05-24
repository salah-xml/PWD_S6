<?php
require 'T1.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)");
        $stmt->execute([
         $_POST['titre'],
         $_POST['auteur'],
         $_POST['date_creation']
        ]);
        
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => 'L\'exercice a été ajouté avec succès'
        ];
    } catch (PDOException $e) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Erreur lors de l\'ajout de l\'exercice: ' . $e->getMessage()
        ];
    }
    
    header('Location: T2.php');
    exit;
}
?>