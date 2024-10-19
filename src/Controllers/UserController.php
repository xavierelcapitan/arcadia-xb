<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    // Créer un utilisateur
    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                User::add($_POST);
                header('Location: /index.php?controller=admin&action=users');
                exit;
            } catch (\Exception $e) {
                // Gérer l'erreur et afficher le message
                $error = $e->getMessage();
                $view = __DIR__ . '/../../Views/admin/users/create.php';
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            }
        } else {
            // Affichage du formulaire de création
            $view = __DIR__ . '/../../Views/admin/users/create.php';
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        }
    }

    // Modifier un utilisateur
    public function editUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = User::find($id);

            if ($user) {
                $view = __DIR__ . '/../../Views/admin/users/edit.php';  // Vue d'édition
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            } else {
                // Redirection si l'utilisateur n'existe pas
                header('Location: /index.php?controller=admin&action=users');
                exit;
            }
        } else {
            // Redirection si l'ID n'est pas passé
            header('Location: /index.php?controller=admin&action=users');
            exit;
        }
    }

    // Mettre à jour un utilisateur
    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    
            $id = $_POST['id'];
    
            // Mettre à jour les données de l'utilisateur
            User::update($id, [
                'email' => $_POST['email'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'role' => $_POST['role']
            ]);
    
            // Redirection après mise à jour réussie
            header('Location: /index.php?controller=admin&action=users');
            exit;
        } else {
            // Redirection si la requête est incorrecte
            header('Location: /index.php?controller=admin&action=users');
            exit;
        }
    }
    

    // Supprimer un utilisateur
    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Suppression de l'utilisateur
                User::delete($id);
    
                // Redirection après suppression
                header('Location: /index.php?controller=admin&action=users');
                exit;
            } else {
                // Afficher la confirmation avant suppression
                $user = User::find($id);
                $view = __DIR__ . '/../../Views/admin/users/confirm_delete.php';  // Vue pour la confirmation
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            }
        } else {
            // Redirection si l'ID est manquant
            header('Location: /index.php?controller=admin&action=users');
            exit;
        }
    }
    

    // Lister les utilisateurs
    public function listUsers()
    {
        $users = User::all();
        $view = __DIR__ . '/../../Views/admin/users/list.php';  // Chemin correct vers la vue liste
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';  // Utilisation du bon layout
    }
}
