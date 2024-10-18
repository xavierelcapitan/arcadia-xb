<?php
// src/Controllers/UserController.php

namespace App\Controllers;

use App\Models\User;

// src/Controllers/UserController.php
class UserController
{
// Méthode pour créer un utilisateur
public function createUser()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        User::add($_POST);
        header('Location: /index.php?controller=admin&action=users');
        exit;
    } else {
        $view = __DIR__ . '/../../Views/admin/users/create.php';  // Définit le chemin de la vue
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';  // Charge le layout avec la vue
    }
}




// Méthode pour modifier un utilisateur
public function editUser()
{
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        User::update($id, $_POST);
        header('Location: /index.php?controller=admin&action=users');
        exit;
    } else {
        $user = User::find($id);
        $page = __DIR__ . '/../../Views/admin/users/edit.php';  // Chemin correct vers la vue
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';  // Utilisation du fichier 'templatedashboard.php'
    }
}


public function deleteUser()
{  $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    User::delete($id);
    // Rediriger vers la liste des utilisateurs
    header('Location: /index.php?controller=admin&action=users');
    exit;
} else {
    $user = User::find($id);
    $page = __DIR__ . '/../../Views/admin/users/edit.php';  // Chemin correct vers la vue
    require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';  // Utilisation du fichier 'templatedashboard.php'
}
}


    public function listUsers()
    {
        $users = User::all();
        $page = __DIR__ . '/../Views/admin/users/list.php';
        require_once __DIR__ . '/../Views/layouts/dashboard.php';
    }
}
