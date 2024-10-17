<?php

// Définir une constante pour le chemin du projet
define('ROOT', dirname(__DIR__));

// Inclure l'autoloader
require_once ROOT . '/src/Config/Autoloader.php';

// Enregistrer l'autoloader
\App\Config\Autoloader::register();

use App\Config\Db;

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
        throw new \Exception("L'action $action n'existe pas dans le contrôleur $controllerClass.");
    }
} else {
    throw new \Exception("Le contrôleur $controllerClass est introuvable.");
}
