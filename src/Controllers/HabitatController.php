<?php

namespace App\Controllers;

use App\Models\Habitat;

class HabitatController
{
    // Afficher la liste des habitats
    public function listHabitats()
    {
        $habitats = Habitat::all();
        $view = __DIR__ . '/../../Views/admin/habitats/list.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }

    // Créer un habitat
    public function createHabitat()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Habitat::add($_POST);
            header('Location: /index.php?controller=habitat&action=listHabitats');
            exit;
        } else {
            $view = __DIR__ . '/../../Views/admin/habitats/create.php';
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        }
    }

    // Modifier un habitat
    public function editHabitat()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $habitat = Habitat::find($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Habitat::update($id, $_POST);
                header('Location: /index.php?controller=habitat&action=listHabitats');
                exit;
            }

            $view = __DIR__ . '/../../Views/admin/habitats/edit.php';
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        } else {
            header('Location: /index.php?controller=habitat&action=listHabitats');
            exit;
        }
    }

    // Supprimer un habitat
    public function deleteHabitat()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            // Supprimer l'habitat directement après confirmation JavaScript
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Habitat::delete($id);
    
                // Redirection après suppression
                header('Location: /index.php?controller=habitat&action=listHabitats');
                exit;
            }
        } else {
            header('Location: /index.php?controller=habitat&action=listHabitats');
            exit;
        }
    }
    
}
