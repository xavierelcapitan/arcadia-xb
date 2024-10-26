<?php

namespace App\Controllers;

use App\Models\VeterinaryReport;

header('Content-Type: application/json');

// Récupérer les filtres depuis la requête POST
$filters = json_decode(file_get_contents('php://input'), true);

// Obtenir les rapports filtrés
$reports = VeterinaryReport::getFilteredReports($filters);

// Retourner les résultats en JSON
echo json_encode($reports);
