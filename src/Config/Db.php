<?php

namespace App\Config;  

use PDO;

class Db extends PDO
{
    private static $instance = null;

    private const DBHOST = 'mysql-elcapitanstudi.alwaysdata.net';
    private const DBNAME = 'elcapitanstudi_ecf';
    private const DBUSER = '373289_elcapitan';
    private const DBPASS = 'Schmidt-Bdd/elc83';

    private function __construct()
    {
        $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . ';charset=utf8';

        try {
            parent::__construct($dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
