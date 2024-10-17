<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    public function list() {
        // Récupérer tous les utilisateurs via le modèle
        $users = User::getAll();

        // Rendre la vue des utilisateurs
        require_once __DIR__ . '/../../Views/admin/users/list.php';
    }

    public function create() {
        // Logique pour créer un utilisateur
    }

    public function edit($id) {
        // Logique pour éditer un utilisateur
    }

    public function delete($id) {
        // Logique pour supprimer un utilisateur
    }
}
