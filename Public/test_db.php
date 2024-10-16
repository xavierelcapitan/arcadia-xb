<?php
require_once __DIR__ . '/../Config/Db.php';

use App\Config\Db;

try {
    $db = Db::getInstance();
    echo "Connexion réussie à la base de données.";
} catch (\PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
