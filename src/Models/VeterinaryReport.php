<?php

namespace App\Models;

use PDO;
use App\Config\Db;

class VeterinaryReport extends Model {

    // Ajouter un nouveau rapport vétérinaire
    public static function add($data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare('INSERT INTO veterinary_reports (animal_id, user_id, checkup_date, health_status, food_given, food_quantity, recommendations) 
                              VALUES (:animal_id, :user_id, :checkup_date, :health_status, :food_given, :food_quantity, :recommendations)');
        return $stmt->execute([
            ':animal_id' => $data['animal_id'],
            ':user_id' => $data['user_id'],  // Vétérinaire qui enregistre
            ':checkup_date' => $data['checkup_date'],
            ':health_status' => $data['health_status'],
            ':food_given' => $data['food_given'],
            ':food_quantity' => $data['food_quantity'],
            ':recommendations' => $data['recommendations']
        ]);
    }

    // Récupérer les rapports vétérinaires pour un animal donné
    public static function getByAnimalId($animal_id)
    {
        // Utiliser l'instance de la base de données
        $db = (new self())->getDbInstance();

        // Préparer la requête pour récupérer les rapports liés à un animal
        $stmt = $db->prepare('SELECT * FROM veterinary_reports WHERE animal_id = :animal_id');
        $stmt->execute(['animal_id' => $animal_id]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
