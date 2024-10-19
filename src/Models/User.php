<?php

namespace App\Models;

use PDO;

class User extends Model
{
    // Récupérer tous les utilisateurs
    public static function all()
    {
        $db = (new self())->getDbInstance(); // Appelle la méthode héritée de Model
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Récupérer un utilisateur par ID
    public static function find($id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Supprimer un utilisateur
    public static function delete($id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }

    // Ajouter un utilisateur
    public static function add($data)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('INSERT INTO users (email, password, first_name, last_name, role) VALUES (:email, :password, :first_name, :last_name, :role)');
        return $stmt->execute([
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':role' => $data['role']
        ]);
    }

    // Mettre à jour un utilisateur
    public static function update($id, $data)
    {
        $db = (new self())->getDbInstance();
        
        // Préparer la requête de mise à jour
        $stmt = $db->prepare('UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, role = :role WHERE id = :id');
        
        // Exécuter la requête avec les valeurs
        $result = $stmt->execute([
            ':id' => $id,
            ':email' => $data['email'],
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':role' => $data['role']
        ]);
    
        // Débogage : vérifier si la requête réussit ou échoue
        if (!$result) {
            var_dump($stmt->errorInfo()); // Afficher les erreurs SQL si la requête échoue
            die(); // Arrêter l'exécution pour voir le résultat
        }
    }

    // Méthode getById() (si nécessaire)
    public static function getById($id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
