<?php
// src/Controllers/Pages.php

namespace App\Controllers;

use App\Models\Service;

class PageController {
    public function habitats() {
        $view = __DIR__ . '/../../Views/pages/habitats.php';
        require_once __DIR__ . '/../../Views/layouts/default.php';
    }

    public function contact() {
        $view = __DIR__ . '/../../Views/pages/contact.php';
        require_once __DIR__ . '/../../Views/layouts/default.php';
    }

    public function services()
    {
        $services = Service::getAll(); 
        $pageTitle = 'Nos Services'; 
        $view = __DIR__ . '/../../Views/pages/services.php';
        require_once __DIR__ . '/../../Views/layouts/default.php'; 
    }
}
