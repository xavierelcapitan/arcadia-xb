<?php
// Models/VeterinaryReport.php


namespace App\Models;

use PDO;
use App\Models\Model;

class VeterinaryReport extends Model
{
    protected static $table = 'veterinary_reports';

    // Récupérer les rapports vétérinaires par ID d'animal
    public static function getByAnimalId($animal_id)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("
            SELECT vr.*, u.first_name AS user_name
            FROM veterinary_reports vr
            JOIN users u ON vr.user_id = u.id
            WHERE vr.animal_id = :animal_id
            ORDER BY vr.last_checkup_date DESC
        ");
        $stmt->execute([':animal_id' => $animal_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Ajouter un rapport vétérinaire
    public static function add($data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("
            INSERT INTO veterinary_reports (animal_id, user_id, last_checkup_date, health_status, food_given, food_quantity, additional_notes, created_at)
            VALUES (:animal_id, :user_id, :last_checkup_date, :health_status, :food_given, :food_quantity, :additional_notes, NOW())
        ");
        
        $stmt->execute([
            ':animal_id' => $data['animal_id'],
            ':user_id' => $data['user_id'],
            ':last_checkup_date' => $data['last_checkup_date'],
            ':health_status' => $data['health_status'],
            ':food_given' => $data['food_given'],
            ':food_quantity' => $data['food_quantity'],
            ':additional_notes' => $data['additional_notes']  
        ]);
    }
    

    public static function getReportById($id)
{
    $db = (new self())->getDbInstance();
    $stmt = $db->prepare("SELECT * FROM veterinary_reports WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

}
