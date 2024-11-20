<?php
// src/Controllers/MainController.php

namespace App\Controllers;

class MainController {
    public function index() {
        $scheduleController = new ScheduleController();
        $schedules = $scheduleController->getSchedules();

        $view = __DIR__ . '/../../Views/home.php';  
        $pageTitle = 'Accueil'; 
        require_once __DIR__ . '/../../Views/layouts/default.php'; 
    }
}