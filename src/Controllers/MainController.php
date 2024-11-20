<?php
// src/Controllers/MainController.php

namespace App\Controllers;

use App\Controllers\ScheduleController;

class MainController {
    public function index() {
        $scheduleController = new ScheduleController();
        $schedules = $scheduleController->index();

        // Gère le cas où aucun horaire n'est récupéré
        if (empty($schedules)) {
            $errorMessage = 'Aucun horaire disponible actuellement.';
        } else {
            // Récupère l'horaire du jour
            $currentDay = date('l');
            $todaySchedule = array_filter($schedules, fn($schedule) => $schedule['day'] === $currentDay);
        }

        $pageTitle = 'Accueil';
        $view = __DIR__ . '/../../Views/home.php';
        require_once __DIR__ . '/../../Views/layouts/default.php';
    }
}
