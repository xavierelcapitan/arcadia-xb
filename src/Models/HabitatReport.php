<?php

namespace App\Models;

use PDO;

class HabitatReport extends Model
{
    protected static $table = 'habitat_reports'; // Nom de la table

    // Récupérer le rapport par l'ID de l'habitat
    public static function getReportByHabitatId($habitat_id)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare("SELECT * FROM habitat_reports WHERE habitat_id = :habitat_id");
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Retourner un objet avec les données du rapport
    }
    

    // Ajouter ou mettre à jour un rapport
    public static function saveReport($data)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare("INSERT INTO habitat_reports (habitat_id, vet_opinion, improvements, created_at, updated_at) 
                              VALUES (:habitat_id, :vet_opinion, :improvements, NOW(), NOW())");
        $stmt->bindParam(':habitat_id', $data['habitat_id']);
        $stmt->bindParam(':vet_opinion', $data['vet_opinion']);
        $stmt->bindParam(':improvements', $data['improvements']);
        $stmt->execute();
    }
    
    

    public static function updateReport($data)
{
    $db = self::getDbInstance();
    $stmt = $db->prepare("
        UPDATE habitat_reports
        SET vet_opinion = :vet_opinion, improvements = :improvements
        WHERE habitat_id = :habitat_id
    ");
    
    $stmt->execute([
        ':vet_opinion' => $data['vet_opinion'],
        ':improvements' => $data['improvements'],
        ':habitat_id' => $data['habitat_id']
    ]);
}

}
