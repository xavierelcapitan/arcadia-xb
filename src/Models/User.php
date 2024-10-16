<?php

namespace App\Models;
use PDO;

class User extends Model {
    public static function getAll() {
        // Récupère tous les utilisateurs
        $db = self::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id) {
        // Récupère un utilisateur par son ID
        $db = self::getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
