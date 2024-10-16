<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Habitat;

class AdminController {

    public function dashboard() {
        // Récupérer les utilisateurs
        $users = User::getAll(); // Méthode à définir dans User.php

        // Récupérer les habitats
        $habitats = Habitat::getAll(); // Méthode à définir dans Habitat.php

        // Passer les données à la vue
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }
}
