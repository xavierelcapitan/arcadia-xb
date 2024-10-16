<?php

namespace App\Models;

use PDO;

class Habitat extends Model {

    public static function getAll() {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM habitats');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
