<?php

namespace App\Models;

class User extends Model {  // Héritage de Model pour réutiliser la connexion et les méthodes communes

    // Accéder à l'instance de la base de données via le modèle parent
    private static function getDbInstance() {
        return (new self())->db; // Retourne la connexion à la base de données
    }

    // Récupérer tous les utilisateurs
    public static function getAll() {
        $db = self::getDbInstance();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    // Ajouter un utilisateur
    public static function add($data) {
        $db = self::getDbInstance();
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
        $db = self::getDbInstance();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Mettre à jour un utilisateur
    public static function update($id, $data) {
        $db = self::getDbInstance();
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
        $db = self::getDbInstance();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
