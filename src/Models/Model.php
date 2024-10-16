<?php

namespace App\Models;

use PDO;

class Model {
    protected static function getDB() {
        // Connexion à la base de données
        $db = new PDO('mysql:host=mysql-elcapitanstudi.alwaysdata.net;dbname=elcapitanstudi_ecf', '373289_elcapitan', 'Schmidt-Bdd/elc83');
        return $db;
    }
}
