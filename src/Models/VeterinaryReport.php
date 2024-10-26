<?php
// Models/VeterinaryReport.php

namespace App\Models;

use PDO;

class VeterinaryReport extends Model
{
    protected static $table = 'veterinary_reports';

    // Récupérer tous les rapports vétérinaires
    public static function getAllReports()
    {
        $db = self::getDbInstance();
        $query = "SELECT vr.*, a.name AS animal_name, a.race, h.name AS habitat_name
                  FROM veterinary_reports vr
                  JOIN animals a ON vr.animal_id = a.id
                  JOIN habitats h ON a.habitat_id = h.id";
        
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

       // Récupérer un rapport vétérinaire par ID
       public static function getReportById($reportId)
       {
           $db = self::getDbInstance();
           $query = "SELECT vr.*, a.name AS animal_name, a.race, h.name AS habitat_name
                     FROM veterinary_reports vr
                     JOIN animals a ON vr.animal_id = a.id
                     JOIN habitats h ON a.habitat_id = h.id
                     WHERE vr.id = :reportId";
           
           $stmt = $db->prepare($query);
           $stmt->bindParam(':reportId', $reportId, PDO::PARAM_INT);
           $stmt->execute();
   
           return $stmt->fetch(PDO::FETCH_ASSOC); // Récupère un seul rapport
       }

       // Méthode pour récupérer les rapports filtrés
    public static function getFilteredReports($filters)
    {
        $db = self::getDbInstance();
        
        // Début de la requête
        $query = "SELECT vr.*, a.name AS animal_name, a.race, h.name AS habitat_name
                  FROM veterinary_reports vr
                  JOIN animals a ON vr.animal_id = a.id
                  JOIN habitats h ON a.habitat_id = h.id
                  WHERE 1=1";

        // Tableau pour stocker les paramètres
        $params = [];

        // Ajout des filtres dynamiquement
        if (!empty($filters['animalName'])) {
            $query .= " AND a.name LIKE :animalName";
            $params[':animalName'] = '%' . $filters['animalName'] . '%';
        }
        if (!empty($filters['animalRace'])) {
            $query .= " AND a.race LIKE :animalRace";
            $params[':animalRace'] = '%' . $filters['animalRace'] . '%';
        }
        if (!empty($filters['reportDate'])) {
            $query .= " AND vr.last_checkup_date = :reportDate";
            $params[':reportDate'] = $filters['reportDate'];
        }
        if (!empty($filters['healthStatus'])) {
            $query .= " AND vr.health_status = :healthStatus";
            $params[':healthStatus'] = $filters['healthStatus'];
        }

        // Préparation et exécution de la requête
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        // Retourner les résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

