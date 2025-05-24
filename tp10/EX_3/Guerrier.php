<?php
class Guerrier {
    private $id;
    private $nom;
    private $degats;
    
    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->nom = $data['nom'];
        $this->degats = $data['degats'] ?? 0;
    }
    
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getDegats() { return $this->degats; }
    
    public function frapper(Guerrier $cible) {
        $cible->recevoirDegats(5);
    }
    
    public function recevoirDegats($points) {
        $this->degats += $points;
        
        if ($this->degats >= 100) {
            $this->supprimer();
            return false;
        }
        
        return true; 
    }
    
    
    public function estVivant() {
        return $this->degats < 100;
    }
    
    
    public function sauvegarder() {
        $db = Database::getConnection();
        
        if ($this->id) {
            
            $stmt = $db->prepare("UPDATE guerriers SET nom = ?, degats = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->degats, $this->id]);
        } else {
            
            $stmt = $db->prepare("INSERT INTO guerriers (nom, degats) VALUES (?, ?)");
            $stmt->execute([$this->nom, $this->degats]);
            $this->id = $db->lastInsertId();
        }
    }
    
    
    public function supprimer() {
        if ($this->id) {
            $db = Database::getConnection();
            $stmt = $db->prepare("DELETE FROM guerriers WHERE id = ?");
            $stmt->execute([$this->id]);
        }
    }
    
    
    public function __toString() {
        return $this->nom . " - Dégâts: " . $this->degats . "/100";
    }
}