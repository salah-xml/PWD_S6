<?php
require 'T1.php';
session_start();

if (isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM exercice WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => 'L\'exercice a été supprimé avec succès'
        ];
    } catch (PDOException $e) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Erreur lors de la suppression: ' . $e->getMessage()
        ];
    }
}

header('Location: T2.php');
exit;
?>