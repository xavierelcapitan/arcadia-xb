<?php

class Autoloader {
    public static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class) {
        // Remplace les backslashes dans le namespace par des slashes pour le chemin des fichiers
        $class = str_replace('\\', '/', $class);

        // Construit le chemin du fichier à partir du namespace
        $file = __DIR__ . '/../../' . $class . '.php';

        // Vérifie si le fichier existe, puis l'inclut
        if (file_exists($file)) {
            require_once $file;
        } else {
            // Afficher un message d'erreur si le fichier n'est pas trouvé
            throw new Exception("Le fichier pour la classe $class est introuvable à l'emplacement $file.");
        }
    }
}
