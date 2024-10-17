<?php

// Inclure l'autoloader de Composer
require_once __DIR__ . '/../src/Config/Autoloader.php';
// Public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

Autoloader::register();

use App\Config\Db;  // Le use est ici, en dehors de tout bloc



// Récupérer l'instance de la base de données
$db = Db::getInstance();

// Gérer la requête de l'utilisateur
$controller = $_GET['controller'] ?? 'Main'; // Contrôleur par défaut
$action = $_GET['action'] ?? 'index'; // Action par défaut

// Construire le nom complet du contrôleur
$controllerClass = "\\App\\Controllers\\" . ucfirst($controller) . "Controller";

// Vérifier si la classe du contrôleur existe
if (class_exists($controllerClass)) {
    $controllerInstance = new $controllerClass();
    
    // Vérifier si la méthode d'action existe
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        // Gestion d'erreur si l'action n'existe pas
        echo "L'action $action n'existe pas dans le contrôleur $controllerClass.";
    }
} else {
    // Gestion d'erreur si le contrôleur n'existe pas
    echo "Le contrôleur $controllerClass est introuvable.";
}
