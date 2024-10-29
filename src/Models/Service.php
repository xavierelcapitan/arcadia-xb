<?php
// Models/Service.php

namespace App\Models;
use App\Models\Model;
use PDO;

class Service extends Model
{
    protected static $table = 'services';

    public static function getAll()
    {
        $db = self::getDbInstance();
        $stmt = $db->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        $db = (new self())->getDbInstance();
        $stmt = $db->prepare("INSERT INTO services (name, description, location, created_at) VALUES (:name, :description, :location, :created_at)");
        return $stmt->execute($data);
    }
    

    public static function add($data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("INSERT INTO services (name, description, location, created_at) VALUES (:name, :description, :location, NOW())");
        return $stmt->execute($data);
    }

    public static function update($id, $data)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("UPDATE services SET name = :name, description = :description, location = :location WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public static function delete($id)
    {
        $db = self::getDbInstance();
        $stmt = $db->prepare("DELETE FROM services WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
