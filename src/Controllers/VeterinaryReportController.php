<?php 

namespace App\Models;

use PDO;

class VeterinaryReport extends Model
{
    protected static $table = 'veterinary_reports';

    // Récupérer les rapports vétérinaires pour un animal donné
    public static function getByAnimalId($animal_id)
    {
        // Créer une instance pour accéder à la base de données
        $instance = new self();
        $db = $instance->getDbInstance();

        // Préparer la requête SQL pour récupérer les rapports vétérinaires de cet animal
        $stmt = $db->prepare('SELECT * FROM veterinary_reports WHERE animal_id = :animal_id');
        $stmt->execute([':animal_id' => $animal_id]);

        // Renvoyer les résultats sous forme d'objets
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}



?>