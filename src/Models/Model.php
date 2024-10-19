<?php

namespace App\Models;

use PDO;
use App\Config\Db;

class Model
{
    protected $db;

    public function __construct()
    {
        // Utiliser l'instance de connexion à la base de données définie dans Db.php
        $this->db = Db::getInstance();
    }

    // Méthode pour récupérer l'instance de la base de données (utilisée dans les classes enfants)
    protected function getDbInstance()
    {
        return $this->db;
    }
}
