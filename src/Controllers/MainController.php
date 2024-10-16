<?php
// src/Controllers/MainController.php

namespace App\Controllers;

class MainController {
    public function index() {
        // Logique pour la page d'accueil
        // On peut rendre une vue ici
        require_once __DIR__ . '/../Views/home.php';
    }
}