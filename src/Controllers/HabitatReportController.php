<?php
// HabitatReportController.php

namespace App\Controllers;

use App\Models\HabitatReport;
use App\Config\SessionManager;

class HabitatReportController
{

public function showReport()
{
    SessionManager::start();

    $habitat_id = $_GET['habitat_id'] ?? null;

    if (!$habitat_id) {
        echo "Habitat non trouvé.";
        return;
    }

    // Récupérer les détails de l'habitat
    $habitat = \App\Models\Habitat::findById($habitat_id);

    if (!$habitat) {
        echo "Habitat non trouvé.";
        return;
    }

    // Récupérer le rapport pour cet habitat
    $report = \App\Models\HabitatReport::getReportByHabitatId($habitat_id);

    // Récupérer le rôle de l'utilisateur depuis la session
    $user_role = SessionManager::get('user_role');

    // Charger la vue avec les données
    $view = __DIR__ . '/../../Views/admin/habitats/report.php';
    require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
}


    
    

public function create()
{
    SessionManager::start();
    
    $habitat_id = $_GET['habitat_id'] ?? null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'habitat_id' => $habitat_id,
            'vet_opinion' => $_POST['vet_opinion'],
            'improvements' => $_POST['improvements']
        ];

        // Insérer le rapport dans la base de données
        HabitatReport::saveReport($data);
        
        // Redirection après l'insertion
        header('Location: /index.php?controller=habitatReport&action=showReport&habitat_id=' . $habitat_id);
        exit;
    }
}



    
    public function edit()
    {
        SessionManager::start();
    
        $habitat_id = $_GET['habitat_id'] ?? null;
        
        // Récupérer l'habitat avec l'ID
        $habitat = \App\Models\Habitat::findById($habitat_id);
        
        if (!$habitat) {
            echo "Habitat non trouvé.";
            exit;
        }
    
        // Récupérer le rapport existant (ou initialiser un rapport vide)
        $report = HabitatReport::getReportByHabitatId($habitat_id) ?? new \stdClass();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'habitat_id' => $habitat_id,
                'vet_opinion' => $_POST['vet_opinion'],
                'improvements' => $_POST['improvements']
            ];
    
            HabitatReport::updateReport($data);
            header('Location: /index.php?controller=habitatReport&action=showReport&habitat_id=' . $habitat_id);
            exit;
        }
    
        // Transmettre les variables $habitat et $report à la vue
        $view = __DIR__ . '/../../Views/admin/habitats/edit_report.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }
    
    
    

    
}
