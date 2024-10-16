<?php
// Inclure l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Gérer la requête de l'utilisateur
$controller = $_GET['controller'] ?? 'Main'; // Contrôleur par défaut
$action = $_GET['action'] ?? 'index'; // Action par défaut

// Instancier le bon contrôleur
$controllerClass = "\\App\\Controllers\\" . ucfirst($controller) . "Controller";
$controllerInstance = new $controllerClass();

// Appeler la bonne méthode du contrôleur
$controllerInstance->$action();
