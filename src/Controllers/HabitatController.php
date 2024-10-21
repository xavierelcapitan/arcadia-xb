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
            $imageUrl = null;
            $errors = [];
    
            // Vérifier si un fichier a été téléchargé
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                $fileMimeType = mime_content_type($_FILES['image_url']['tmp_name']);
                $maxFileSize = 3 * 1024 * 1024; // 3 Mo
    
                // Vérifier le type MIME
                if (!in_array($fileMimeType, $allowedMimeTypes)) {
                    $errors[] = 'Format d\'image non autorisé. Formats acceptés : jpg, jpeg, png, webp.';
                }
    
                // Vérifier la taille du fichier
                if ($_FILES['image_url']['size'] > $maxFileSize) {
                    $errors[] = 'La taille du fichier ne doit pas dépasser 3Mo.';
                }
    
                // Si aucune erreur, procéder à l'upload
                if (empty($errors)) {
                    $targetDirectory = __DIR__ . '/../../Public/assets/uploads/';
                    $fileName = basename($_FILES['image_url']['name']);
                    $targetFile = $targetDirectory . $fileName;
    
                    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFile)) {
                        $imageUrl = '/assets/uploads/' . $fileName;  // Chemin relatif à stocker dans la base
                    } else {
                        $errors[] = 'Erreur lors de l\'upload de l\'image.';
                    }
                }
            }
    
            if (empty($errors)) {
                // Créer l'habitat avec le chemin de l'image
                Habitat::add([
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'image_url' => $imageUrl
                ]);
    
                header('Location: /index.php?controller=habitat&action=listHabitats');
                exit;
            } else {
                // Afficher les erreurs si elles existent
                $view = __DIR__ . '/../../Views/admin/habitats/create.php';
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            }
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
        $errors = [];
        $imageUrl = $habitat->image_url; // Garder l'image actuelle par défaut

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier si un nouveau fichier a été téléchargé
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                $fileMimeType = mime_content_type($_FILES['image_url']['tmp_name']);
                $maxFileSize = 3 * 1024 * 1024; // 3 Mo

                // Vérifier le type MIME
                if (!in_array($fileMimeType, $allowedMimeTypes)) {
                    $errors[] = 'Format d\'image non autorisé. Formats acceptés : jpg, jpeg, png, webp.';
                }

                // Vérifier la taille du fichier
                if ($_FILES['image_url']['size'] > $maxFileSize) {
                    $errors[] = 'La taille du fichier ne doit pas dépasser 3Mo.';
                }

                // Si aucune erreur, procéder à l'upload
                if (empty($errors)) {
                    $targetDirectory = __DIR__ . '/../../Public/assets/uploads/';
                    $fileName = basename($_FILES['image_url']['name']);
                    $targetFile = $targetDirectory . $fileName;

                    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFile)) {
                        $imageUrl = '/assets/uploads/' . $fileName;
                    } else {
                        $errors[] = 'Erreur lors de l\'upload de l\'image.';
                    }
                }
            }

            if (empty($errors)) {
                // Mettre à jour l'habitat avec le chemin de l'image
                Habitat::update($id, [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'image_url' => $imageUrl
                ]);

                header('Location: /index.php?controller=habitat&action=listHabitats');
                exit;
            } else {
                // Afficher les erreurs s'il y en a
                $view = __DIR__ . '/../../Views/admin/habitats/edit.php';
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            }
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
    

