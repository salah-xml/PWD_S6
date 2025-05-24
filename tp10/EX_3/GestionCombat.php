<?php
class GestionCombat {
    
    public static function creerGuerrier($nom) {
        try {
            $db = Database::getConnection();
            
            
            $stmt = $db->prepare("SELECT id FROM guerriers WHERE nom = ?");
            $stmt->execute([$nom]);
            
            if ($stmt->fetch()) {
                return false; 
            }
            
            
            $guerrier = new Guerrier(['nom' => $nom]);
            $guerrier->sauvegarder();
            
            return $guerrier;
        } catch (PDOException $e) {
            error_log("Erreur lors de la création du guerrier: " . $e->getMessage());
            return false;
        }
    }





    
    public static function obtenirGuerrier($nom) {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT * FROM guerriers WHERE nom = ?");
            $stmt->execute([$nom]);
            
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($data) {
                return new Guerrier($data);
            }
            return null;
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération du guerrier: " . $e->getMessage());
            return null;
        }
    }
    
    
    public static function jouerTour($nomGuerrier1, $nomGuerrier2) {
        $guerrier1 = self::obtenirGuerrier($nomGuerrier1);
        $guerrier2 = self::obtenirGuerrier($nomGuerrier2);
        
            if (!$guerrier1 || !$guerrier2) {
            return "Un des guerriers n'existe pas";
        }
        
            if (!$guerrier1->estVivant()) {
            return $guerrier1->getNom() . " est déjà mort!";
        }
        
           if (!$guerrier2->estVivant()) {
            return $guerrier2->getNom() . " est déjà mort!";
        }
        
        
        $guerrier1->frapper($guerrier2);
        
        
            if ($guerrier2->estVivant()) {
            $guerrier2->frapper($guerrier1);
        }
        
        
           if ($guerrier1->estVivant()) {
            $guerrier1->sauvegarder();
        }
        
           if ($guerrier2->estVivant()) {
            $guerrier2->sauvegarder();
        }
        
        return [
            'message' => "Tour de combat terminé",
            'guerrier1' => $guerrier1,
            'guerrier2' => $guerrier2
        ];
    }
    
    
    public static function listerGuerriersVivants() {
        try {
            $db = Database::getConnection();
            $stmt = $db->query("SELECT * FROM guerriers WHERE degats < 100");
            
            $guerriers = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $guerriers[] = new Guerrier($data);
            }
            
            return $guerriers;
        } catch (PDOException $e) {
            error_log("Erreur lors de la liste des guerriers: " . $e->getMessage());
            return [];
        }
    }
}