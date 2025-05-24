<?php
class Database {
       private static $connection = null;
    
       public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    'mysql:host=localhost;dbname=jeu_combat;charset=utf8',
                    'root', 
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}