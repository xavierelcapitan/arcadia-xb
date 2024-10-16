<?php

namespace App\Models;
use App\Config\Db;
use PDO;

class User extends Model {

     // Récupérer tous les utilisateurs
     public static function getAll() {
        $db = Db::getInstance(); // Utilisation de l'instance de la base de données
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    // Ajouter un utilisateur
    public static function add($data) {
        $db = Db::getInstance();
        $stmt = $db->prepare('INSERT INTO users (email, password, first_name, last_name, role) VALUES (:email, :password, :first_name, :last_name, :role)');
        return $stmt->execute([
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':role' => $data['role']
        ]);
    }


   // Récupérer un utilisateur par ID
   public static function getById($id) {
    $db = Db::getInstance(); // Utilisation de Db::getInstance() pour la connexion
    $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

// Mettre à jour un utilisateur
public static function update($id, $data) {
    $db = Db::getInstance();
    $stmt = $db->prepare('UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, role = :role WHERE id = :id');
    return $stmt->execute([
        ':id' => $id,
        ':email' => $data['email'],
        ':first_name' => $data['first_name'],
        ':last_name' => $data['last_name'],
        ':role' => $data['role']
    ]);
}

// Supprimer un utilisateur
public static function delete($id) {
    $db = Db::getInstance();
    $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
    return $stmt->execute([':id' => $id]);
}
}
