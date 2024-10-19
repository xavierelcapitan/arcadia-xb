<?php

use App\Config\Autoloader;

// Charger l'autoloader
require_once __DIR__ . '/../src/Config/Autoloader.php';
require_once __DIR__ . '/../vendor/autoload.php';
Autoloader::register();

// Récupérer le controller et l'action depuis les paramètres d'URL (ou par défaut)
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'MainController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Ajouter le namespace au controller
$controller = 'App\\Controllers\\' . $controller;

if (class_exists($controller)) {
    $controllerInstance = new $controller(); // Instancier la classe du controller

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action(); // Appeler la méthode d'action
    } else {
        echo "Action '$action' non trouvée.";
    }
} else {
    echo "Contrôleur '$controller' non trouvé.";
}
