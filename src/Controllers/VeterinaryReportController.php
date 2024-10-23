<?php 

namespace App\Models;

use PDO;

class VeterinaryReport extends Model
{
    protected static $table = 'veterinary_reports';

   // Récupérer les rapports vétérinaires par ID d'animal
   public static function getByAnimalId($animal_id)
   {
       $db = (new self())->getDbInstance();
       $stmt = $db->prepare("SELECT * FROM veterinary_reports WHERE animal_id = :animal_id");
       $stmt->execute([':animal_id' => $animal_id]);
       return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

    public function addReport()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'animal_id' => $_POST['animal_id'],
                'user_id' => $_SESSION['user_id'], // Vétérinaire connecté
                'last_checkup_date' => date('Y-m-d'),
                'health_status' => $_POST['health_status'],
                'food_given' => $_POST['food_given'],
                'food_quantity' => $_POST['food_quantity'],
                'additional_notes' => $_POST['additional_notes'],
            ];
    
            VeterinaryReport::add($data);
    
            header('Location: /index.php?controller=animal&action=details&id=' . $_POST['animal_id']);
            exit;
        }

}

}

?>