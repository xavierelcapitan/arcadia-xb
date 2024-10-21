<?php
// Models/Animal.php
namespace App\Models;

use PDO;
use App\Config\Db;

class Animal extends Model {

    // Récupérer tous les animaux
    public static function all()
    {
        $db = self::getDbInstance();
        $stmt = $db->query('SELECT * FROM animals');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Récupérer un animal par son ID
    public static function find($id)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare('SELECT animals.*, habitats.name AS habitat_name FROM animals 
                              LEFT JOIN habitats ON animals.habitat_id = habitats.id
                              WHERE animals.id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Ajouter un nouvel animal
    public static function add($data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare('INSERT INTO animals (name, race, weight, age, habitat_id, image_url, created_at) 
                              VALUES (:name, :race, :weight, :age, :habitat_id, :image_url, NOW())');
        return $stmt->execute([
            ':name' => $data['name'],
            ':race' => $data['race'],
            ':weight' => $data['weight'],
            ':age' => $data['age'],
            ':habitat_id' => $data['habitat_id'],
            ':image_url' => $data['image_url']
        ]);
    }

    // Mettre à jour un animal
    public static function update($id, $data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare('UPDATE animals SET name = :name, race = :race, weight = :weight, age = :age, 
                              habitat_id = :habitat_id, image_url = :image_url WHERE id = :id');
        return $stmt->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':race' => $data['race'],
            ':weight' => $data['weight'],
            ':age' => $data['age'],
            ':habitat_id' => $data['habitat_id'],
            ':image_url' => $data['image_url']
        ]);
    }

    // Supprimer un animal
    public static function delete($id)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare('DELETE FROM animals WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
