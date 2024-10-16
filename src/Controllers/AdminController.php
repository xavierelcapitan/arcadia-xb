<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Habitat; // gèrer des habitats ou d'autres données dans le dashboard

class AdminController {

    // Méthode pour afficher le tableau de bord admin
    public function dashboard() {
        // afficher des statistiques ou d'autres données sur le dashboard
        // Exemple de récupération d'utilisateurs
        $users = User::getAll();

        // Inclure la vue dashboard
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }

    // Méthode pour afficher la liste des utilisateurs
    public function users() {
        $users = User::getAll();
        require_once __DIR__ . '/../Views/admin/users/list.php';
    }

    // Formulaire pour ajouter un utilisateur
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::add($_POST);
            header('Location: /admin/users');
        } else {
            require_once __DIR__ . '/../Views/admin/users/create.php';
        }
    }

    // Formulaire pour modifier un utilisateur
    public function editUser($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::update($id, $_POST);
            header('Location: /admin/users');
        } else {
            $user = User::getById($id);
            require_once __DIR__ . '/../Views/admin/users/edit.php';
        }
    }

    // Supprimer un utilisateur
    public function deleteUser($id) {
        User::delete($id);
        header('Location: /admin/users');
    }
}
