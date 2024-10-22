<?php
// AnimalController.php
namespace App\Controllers;

use App\Models\Animal;
use App\Models\Habitat;
use App\Models\FoodType;
use App\Models\VeterinaryReport;
use PDO;

class AnimalController
{
    // Afficher la liste des animaux
    public function listAnimals()
    {
        // Récupérer tous les animaux avec leur habitat
        $animals = Animal::allWithHabitatName();

        if ($animals) {
            $view = __DIR__ . '/../../Views/admin/animals/list.php';
            require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
        } else {
            echo "Aucun animal trouvé.";
        }
    }

    // Créer un nouvel animal
    public function createAnimal()
    {
        // Récupérer la liste des habitats, races, et types de nourriture pour le dropdown
        $habitats = Habitat::all();
        $races = Animal::getDistinctRaces();
        $foodTypes = Animal::getDistinctFoodTypes();
        $errors = [];

        // Si la requête est POST (soumission du formulaire)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newFoodType = $_POST['new_food_type']; // Nouveau type de nourriture saisi
            $imageUrl = null;

            // Validation de base des champs
            if (empty($_POST['name'])) {
                $errors[] = "Le nom de l'animal est obligatoire.";
            }
            if (empty($_POST['age']) || !is_numeric($_POST['age'])) {
                $errors[] = "L'âge de l'animal est obligatoire et doit être un nombre.";
            }
            if (empty($_POST['weight']) || !is_numeric($_POST['weight'])) {
                $errors[] = "Le poids de l'animal est obligatoire et doit être un nombre.";
            }

            // Si un nouveau type de nourriture est ajouté
            if (!empty($newFoodType)) {
                $selectedFoodType = $newFoodType;  // Utilisation du nouveau type de nourriture directement
            } else {
                $selectedFoodType = $_POST['food_type'];  // Type de nourriture sélectionné dans le dropdown
            }

            
            // Gestion de l'image (facultatif)
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = __DIR__ . '/../../Public/assets/uploads/';
                $fileName = basename($_FILES['image_url']['name']);
                $targetFile = $targetDirectory . $fileName;

                if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFile)) {
                    $imageUrl = '/assets/uploads/' . $fileName;
                } else {
                    $errors[] = 'Erreur lors de l\'upload de l\'image.';
                }
            }

            // S'il n'y a pas d'erreurs, on ajoute l'animal
            if (empty($errors)) {
                Animal::add([
                    'name' => $_POST['name'],
                    'race' => $_POST['race'],
                    'age' => $_POST['age'],
                    'weight' => $_POST['weight'],
                    'habitat_id' => $_POST['habitat_id'],
                    'food_type' => $selectedFoodType,
                    'food_quantity' => $_POST['food_quantity'],
                    'image_url' => $imageUrl,
                ]);

                // Redirection vers la liste des animaux
                header('Location: /index.php?controller=animal&action=listAnimals');
                exit;
            }
        }

        // Transmettre les variables à la vue
        $view = __DIR__ . '/../../Views/admin/animals/create.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }

    // Modifier un animal existant
    public function editAnimal()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $animal = Animal::findWithHabitat($id);
            $habitats = Habitat::all();
            $errors = [];
            $imageUrl = $animal->image_url; // Garder l'image actuelle par défaut

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validation des champs
                if (empty($_POST['name'])) {
                    $errors[] = "Le nom de l'animal est obligatoire.";
                }
                if (empty($_POST['age']) || !is_numeric($_POST['age'])) {
                    $errors[] = "L'âge de l'animal est obligatoire et doit être un nombre.";
                }
                if (empty($_POST['weight']) || !is_numeric($_POST['weight'])) {
                    $errors[] = "Le poids de l'animal est obligatoire et doit être un nombre.";
                }

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
                            $imageUrl = '/assets/uploads/' . $fileName; // Mettre à jour l'image si une nouvelle image est téléchargée
                        } else {
                            $errors[] = 'Erreur lors de l\'upload de l\'image.';
                        }
                    }
                }

                // Si aucune erreur, mettre à jour l'animal
                if (empty($errors)) {
                    Animal::update($id, [
                        'name' => $_POST['name'],
                        'race' => $_POST['race'],
                        'age' => $_POST['age'],
                        'weight' => $_POST['weight'],
                        'habitat_id' => $_POST['habitat_id'],
                        'food_type' => $_POST['food_type'],
                        'food_quantity' => $_POST['food_quantity'],
                        'image_url' => $imageUrl,
                    ]);

                    header('Location: /index.php?controller=animal&action=listAnimals');
                    exit;
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
        $animal = Animal::findWithHabitat($animal_id);

        if (!$animal) {
            header('Location: /index.php?controller=animal&action=listAnimals');
            exit;
        }

        $veterinary_reports = VeterinaryReport::getByAnimalId($animal_id);

        $view = __DIR__ . '/../../Views/admin/animals/details.php';
        require_once __DIR__ . '/../../Views/layouts/templatedashboard.php';
    }
}
