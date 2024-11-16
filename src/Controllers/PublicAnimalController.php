<?php
// src/Controllers/PublicAnimalController.php

namespace App\Controllers;

use App\Models\Animal;
use App\Models\VeterinaryReport;
use App\Models\FeedingReport;

class PublicAnimalController
{
    public function showAnimalDetails()
    {
        // Récupérer l'ID de l'animal
        $animalId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Récupérer les informations de l'animal
        $animal = Animal::findWithHabitat($animalId);

        // Récupérer tous les rapports vétérinaires et de nourrissage pour cet animal
        $veterinary_reports = VeterinaryReport::getReportsByAnimalId($animalId);
        $feeding_reports = FeedingReport::getReportsByAnimalId($animalId);

        // Sélection du dernier rapport dans chaque type de rapport
        $veterinary_report = $veterinary_reports[0] ?? null; // le dernier rapport si disponible
        $feeding_report = $feeding_reports[0] ?? null;       // le dernier rapport si disponible

        if (!$animal) {
            echo "Aucun animal trouvé.";
            exit;
        }

        // Passer les données à la vue
        $view = __DIR__ . '/../../Views/pages/animaux.php';
        $pageTitle = "Détails de : $animal->name";
        require_once __DIR__ . '/../../Views/layouts/default.php';
    }
}
