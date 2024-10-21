<?php

namespace App\Models;

use PDO;
use App\Models\Model;

class Animal extends Model
{
    protected static $table = 'animals'; // Associer la table "animals"

    // Récupérer tous les animaux
    public static function all()
    {
        $db = (new self())->getDbInstance(); // Appel non statique comme dans Habitat
        $stmt = $db->query('SELECT * FROM animals');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Récupérer un animal par son ID
    public static function find($id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('SELECT * FROM animals WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Ajouter un nouvel animal
    public static function add($data)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('INSERT INTO animals (name, race, habitat_id, image_url) VALUES (:name, :race, :habitat_id, :image_url)');
        return $stmt->execute([
            ':name' => $data['name'],
            ':race' => $data['race'],
            ':habitat_id' => $data['habitat_id'],
            ':image_url' => $data['image_url'],
        ]);
    }

    // Mettre à jour un animal
    public static function update($id, $data)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('UPDATE animals SET name = :name, race = :race, habitat_id = :habitat_id, image_url = :image_url WHERE id = :id');
        return $stmt->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':race' => $data['race'],
            ':habitat_id' => $data['habitat_id'],
            ':image_url' => $data['image_url'],
        ]);
    }

    // Supprimer un animal
    public static function delete($id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare('DELETE FROM animals WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
