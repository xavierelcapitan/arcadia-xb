<?php
// src/Config/MongoDBConnection.php

namespace App\Config;

use MongoDB\Client;

require_once __DIR__ . '/../../vendor/autoload.php';





class MongoDBConnection {
    private static $client;

    public static function getMongoConnection() {
        if (!self::$client) {
            self::$client = new Client("mongodb+srv://xavierelcapitan:495aCYPg7RvM4IiH@ecfxb.qvher.mongodb.net/?retryWrites=true&w=majority&connectTimeoutMS=10000");
        }
        return self::$client;
    }
}
