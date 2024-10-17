<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    public function list() {
        // Récupérer tous les utilisateurs via le modèle
        $users = User::getAll();

        // Inclure la vue des utilisateurs avec les données
        $this->render('admin/users/list', ['users' => $users]);
    }

    public function render($view, $data = []) {
        extract($data);
    
      // Chemin correct vers la vue
require_once __DIR__ . '/../../Views/admin/users/list.php';
    }
    

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $data = [
                'email' => $_POST['email'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'role' => $_POST['role'],
                'password' => $_POST['password']
            ];

            // Ajouter l'utilisateur via le modèle
            User::add($data);

            // Rediriger vers la liste des utilisateurs après création
            header('Location: /admin/users/list');
            exit;
        }

        // Rendre la vue du formulaire de création
        require_once __DIR__ . '/../../Views/admin/users/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $data = [
                'email' => $_POST['email'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'role' => $_POST['role']
            ];

            // Mettre à jour l'utilisateur via le modèle
            User::update($id, $data);

            // Rediriger vers la liste des utilisateurs après mise à jour
            header('Location: /admin/users/list');
            exit;
        }

        // Récupérer les informations de l'utilisateur par son ID
        $user = User::getById($id);

        // Rendre la vue du formulaire d'édition
        require_once __DIR__ . '/../../Views/admin/users/edit.php';
    }

    public function delete($id) {
        // Supprimer l'utilisateur via le modèle
        User::delete($id);

        // Rediriger vers la liste des utilisateurs après suppression
        header('Location: /admin/users/list');
        exit;
    }
}
