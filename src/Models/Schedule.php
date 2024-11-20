<?php
// src/Models/Schedule.php

namespace App\Models;

use App\Config\MongoDBConnection;

class Schedule {
    private $collection;

    public function __construct() {
        $client = MongoDBConnection::getMongoConnection();
        $this->collection = $client->selectCollection('arcadia', 'schedules');
    }

    // Récupérer tous les horaires
    public function getAllSchedules() {
        return $this->collection->find()->toArray();
    }

    // Ajouter ou mettre à jour un horaire
    public function saveSchedule($data) {
        $this->collection->updateOne(
            ['day' => $data['day']], // Rechercher par jour
            ['$set' => $data], // Mettre à jour ou ajouter
            ['upsert' => true] // Créer si inexistant
        );
    }

    // Supprimer un horaire
    public function deleteSchedule($day) {
        $this->collection->deleteOne(['day' => $day]);
    }
}
