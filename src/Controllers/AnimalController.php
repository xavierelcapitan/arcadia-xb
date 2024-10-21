<?php

namespace App\Controllers;

use App\Models\Animal;
use App\Models\VeterinaryReport;
use App\Models\Habitat;

class AnimalController {

    // Afficher la liste des animaux
    public function listAnimals()
    {
        $animals = Animal::all(); // Récupérer tous les animaux
        $view = __DIR__ . '/../../Views/admin/animals/list.php'; 
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php'; 
    }

    // Créer un nouvel animal
    public function createAnimal()
    {
        // Récupérer la liste des habitats pour le dropdown
        $habitats = Habitat::all();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageUrl = null;
            $errors = [];
    
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                $fileMimeType = mime_content_type($_FILES['image_url']['tmp_name']);
                $maxFileSize = 3 * 1024 * 1024; // 3 Mo
    
                if (!in_array($fileMimeType, $allowedMimeTypes)) {
                    $errors[] = 'Format d\'image non autorisé. Formats acceptés : jpg, jpeg, png, webp.';
                }
    
                if ($_FILES['image_url']['size'] > $maxFileSize) {
                    $errors[] = 'La taille du fichier ne doit pas dépasser 3Mo.';
                }
    
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
                // Créer l'animal dans la base de données
                Animal::add([
                    'name' => $_POST['name'],
                    'race' => $_POST['race'],
                    'habitat_id' => $_POST['habitat_id'],
                    'image_url' => $imageUrl,
                ]);
    
                header('Location: /index.php?controller=animal&action=listAnimals');
                exit;
            } else {
                // En cas d'erreurs, réafficher le formulaire avec les erreurs
                $view = __DIR__ . '/../../Views/admin/animals/create.php'; 
                require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
            }
        } else {
            // Si la requête est GET, afficher la vue du formulaire
            $view = __DIR__ . '/../../Views/admin/animals/create.php'; 
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        }
    }
    

    // Modifier un animal existant
    public function editAnimal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $animal = Animal::find($id);
            $errors = [];
            $imageUrl = $animal->image_url; // Garder l'image actuelle par défaut

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                    $fileMimeType = mime_content_type($_FILES['image_url']['tmp_name']);
                    $maxFileSize = 3 * 1024 * 1024; // 3 Mo

                    if (!in_array($fileMimeType, $allowedMimeTypes)) {
                        $errors[] = 'Format d\'image non autorisé. Formats acceptés : jpg, jpeg, png, webp.';
                    }

                    if ($_FILES['image_url']['size'] > $maxFileSize) {
                        $errors[] = 'La taille du fichier ne doit pas dépasser 3Mo.';
                    }

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
                    // Mettre à jour l'animal dans la base de données
                    Animal::update($id, [
                        'name' => $_POST['name'],
                        'race' => $_POST['race'],
                        'age' => $_POST['age'],
                        'weight' => $_POST['weight'],
                        'habitat_id' => $_POST['habitat_id'],
                        'image_url' => $imageUrl,
                    ]);
                    header('Location: /index.php?controller=animal&action=listAnimals');
                    exit;
                } else {
                    $view = __DIR__ . '/../../Views/admin/animals/edit.php'; 
                    require_once __DIR__ . '/../../Views/layouts/templatedashboard.php'; 
                }
            }

            $view = __DIR__ . '/../../Views/admin/animals/edit.php'; 
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php'; 
        } else {
            header('Location: /index.php?controller=animal&action=listAnimals');
            exit;
        }
    }

    // Supprimer un animal
    public function deleteAnimal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Animal::delete($id);
                header('Location: /index.php?controller=animal&action=listAnimals');
                exit;
            }
        } else {
            header('Location: /index.php?controller=animal&action=listAnimals');
            exit;
        }
    }

    // Afficher les détails d'un animal et ses rapports vétérinaires
    public function showAnimalDetails()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: /index.php?controller=animal&action=listAnimals');
            exit;
        }

        $animal_id = $_GET['id'];
        $animal = Animal::find($animal_id);

        if (!$animal) {
            header('Location: /index.php?controller=animal&action=listAnimals');
            exit;
        }

        $veterinary_reports = VeterinaryReport::getByAnimalId($animal_id);

        $view = __DIR__ . '/../../Views/admin/animals/details.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php'; 
    }
}
