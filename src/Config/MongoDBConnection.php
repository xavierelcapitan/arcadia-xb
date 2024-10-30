<?php
require 'vendor/autoload.php';

class MongoDBConnection
{
    private static $client = null;

    public static function getInstance()
    {
        if (self::$client === null) {
            self::$client = new MongoDB\Client("mongodb+srv://xavierelcapitan:495aCYPg7RvM4IiH@ecfxb.qvher.mongodb.net?retryWrites=true&w=majority");
        }
        return self::$client;
    }
}
