<?php

namespace App\Models;

use App\Config\Db;  // Connexion à la base de données via Db

class Model {
    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();  // Connexion centralisée à la base de données
    }

    // Méthodes communes pour les modèles, par exemple :
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
