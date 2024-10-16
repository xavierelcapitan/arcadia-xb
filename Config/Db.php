<?php

namespace App\Config;

use PDO;

class Db extends PDO
{
    private static $instance = null;

    private const DBHOST = 'localhost'; 
    private const DBNAME = 'arcadia';   
    private const DBUSER = 'root';      
    private const DBPASS = 'root';      

    // Constructeur privé
    private function __construct()
    {
        // Construction du DSN
        $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . ';charset=utf8';
        
        // Appel du constructeur de la classe PDO
        parent::__construct($dsn, self::DBUSER, self::DBPASS);
        
        // Attributs PDO
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    
    // Méthode pour obtenir une instance unique de la classe Db
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
