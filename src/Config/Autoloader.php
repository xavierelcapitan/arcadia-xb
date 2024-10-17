<?php

namespace App\Config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('App\\', '', $class); // Enlever le namespace "App"
        $class = str_replace('\\', '/', $class); // Remplacer les backslashes par des slashes

        $file = ROOT . '/src/' . $class . '.php'; // Chemin vers les classes

        if (file_exists($file)) {
            require_once $file;
        } else {
            throw new \Exception("Le fichier pour la classe $class est introuvable à l'emplacement $file.");
        }
    }
}
