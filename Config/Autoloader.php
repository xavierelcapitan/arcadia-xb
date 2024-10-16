<?php


class Autoloader {
    public static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class) {
        // Remplace les backslashes par des slashes dans le nom de la classe
        $class = str_replace('\\', '/', $class);
        
        // Construit le chemin du fichier basé sur le nom de la classe
        $file = __DIR__ . '/../src/' . $class . '.php';

        // Vérifie si le fichier existe, puis l'inclut
        if (file_exists($file)) {
            require_once $file;
        }
    }
}


