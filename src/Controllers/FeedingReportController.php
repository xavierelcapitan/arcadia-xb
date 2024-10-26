<?php

namespace App\Controllers;

use App\Models\FeedingReport;
use App\Config\SessionManager;

class FeedingReportController
{
// Dans FeedingReportController.php
public function addReport()
{
    // Démarrer la session si ce n'est pas déjà fait
    SessionManager::start();

    // Récupérer l'ID de l'utilisateur connecté
    $user_id = SessionManager::get('user_id');

    // Vérifier si l'utilisateur est connecté
    if (!$user_id) {
        header('Location: /index.php?controller=auth&action=showLogin');
        exit;
    }

    // Récupérer l'ID de l'animal
    $animal_id = $_GET['animal_id'];

     // Récupérer la date et l'heure actuelles
     $feeding_date = date('Y-m-d H:i:s');

    // Ajouter un rapport de nourrissage
    FeedingReport::add([
        'animal_id' => $animal_id,
        'user_id' => $user_id, 
        'food_quantity' => $_POST['food_quantity'],
        'feeding_date' => date('Y-m-d H:i:s'),
        'food_type_report' => $_POST['food_type_report'] 
    ]);

    // Redirection après ajout
    header('Location: /index.php?controller=animal&action=showAnimalDetails&id=' . $animal_id);
    exit;
}

    
    
}