<?php

namespace App\Controllers;

use App\Models\User;

class AdminController {

    // Méthode pour afficher le tableau de bord
    public function dashboard() {
        $users = User::getAll(); // Si nécessaire
        $view = __DIR__ . '/../../Views/admin/dashboard.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }

    // Méthode pour afficher la liste des utilisateurs
    public function users() {
        $users = User::getAll();
        $content = ""; // Pas nécessaire de définir du contenu ici, tout est géré dans la vue
        require_once __DIR__ . '/../../Views/admin/users/list.php';
    }

    // Méthode pour créer un utilisateur
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::add($_POST);
            header('Location: /index.php?controller=admin&action=users');
        } else {
            $content = ""; // Pas nécessaire de définir du contenu ici
            require_once __DIR__ . '/../../Views/admin/users/create.php';
        }
    }

    // Méthode pour modifier un utilisateur
    public function editUser($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::update($id, $_POST);
            header('Location: /index.php?controller=admin&action=users');
        } else {
            $user = User::getById($id);
            $content = ""; // Pas nécessaire de définir du contenu ici
            require_once __DIR__ . '/../../Views/admin/users/edit.php';
        }
    }

    // Méthode pour supprimer un utilisateur
    public function deleteUser($id) {
        User::delete($id);
        header('Location: /index.php?controller=admin&action=users');
    }
}
