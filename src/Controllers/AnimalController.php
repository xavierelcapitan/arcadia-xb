<?php
// AnimalController.php
namespace App\Controllers;

use App\Models\Animal;
use App\Models\VeterinaryReport;

class AnimalController {

    // Afficher les détails d'un animal et ses rapports vétérinaires
    public function showAnimalDetails()
    {
        $animal_id = $_GET['id'];
        
        // Récupérer l'animal
        $animal = Animal::find($animal_id);

        // Récupérer les rapports vétérinaires de l'animal
        $veterinary_reports = VeterinaryReport::getByAnimalId($animal_id);

        // Charger la vue avec les détails de l'animal et ses rapports
        $view = __DIR__ . '/../../Views/admin/animals/details.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }
}
