<?php
// src/Controllers/ServicesController.php

namespace App\Controllers;

use App\Models\Service;
use App\Config\SessionManager;

class ServicesController
{
    // Liste des services
    public function listServices()
    {
        // Vérifie que l'utilisateur est un administrateur
        SessionManager::start();
    
      // Logique de récupération des services
    $services = Service::getAll();
    $view = __DIR__ . '/../../Views/admin/services/list.php';
    $pageTitle = 'Liste des Services';
    require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
}

    // Création d'un service
    public function createService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'created_at' => date('Y-m-d H:i:s') 
            ];
            Service::create($data); // Utilisation de `create` pour cohérence
            header('Location: /index.php?controller=services&action=listServices');
            exit;
        }

        $view = __DIR__ . '/../../Views/admin/services/create.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }

    // Édition d'un service
    public function editService()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $service = Service::getById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'location' => $_POST['location']
                ];
                Service::update($id, $data); // Utilisation de `update` pour cohérence
                header('Location: /index.php?controller=services&action=listServices');
                exit;
            }

            $view = __DIR__ . '/../../Views/admin/services/edit.php';
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        } else {
            header('Location: /index.php?controller=services&action=listServices'); // Redirection si l'ID n'est pas fourni
            exit;
        }
    }

    // Suppression d'un service
    public function deleteService()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Service::delete($id); // Utilisation de `delete`
            header('Location: /index.php?controller=services&action=listServices');
            exit;
        } else {
            header('Location: /index.php?controller=services&action=listServices'); // Redirection si l'ID n'est pas fourni
            exit;
        }
    }
}
