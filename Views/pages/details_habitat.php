<?php
// Views/pages/details_habitat.php

use App\Controllers\HabitatController;

$habitatController = new HabitatController();

$habitats = $habitatController->publicHabitats();

// Récupère l'id de l'habitat à partir de l'URL
$habitatId = isset($_GET['habitat_id']) ? (int) $_GET['habitat_id'] : 0;
$animals = $habitatController->getAnimalsByHabitat($habitatId);

// Si aucun animal n'est trouvé pour cet habitat
if (!$habitatId || empty($animals)) {
    echo "Aucun animal trouvé pour cet habitat.";
    exit;
}
?>


<!-- DETAIL CARD ANIMAL -->
 <div class="habitat-details">
        <div class="habitat-banner">
            <p class="page-title"><?php echo htmlspecialchars($habitat->name); ?></p>
        </div>
        <?php foreach ($animals as $animal) : ?>
            <section class="container">
            <div class="experience-card col-md-4">
                <div class="experience-card-img-container">
                    <a href="index.php?controller=animal&action=showAnimalDetails&id=<?php echo $animal->id; ?>" class="animal-link">
                    <img src="<?php echo htmlspecialchars($animal->image_url); ?>" alt="Image de <?php echo htmlspecialchars($animal->name); ?>" class="experience-card-img">
                    <div class="experience-card-overlay">
                        <div class="experience-card-content">
                            <h3 class="experience-title-nature"><?php echo htmlspecialchars($animal->name); ?></h3>
                            <p class="experience-description"><?php echo htmlspecialchars($animal->race); ?></p>
                        </div>
                    </div>
                    </a>
                </div></div>
            </section>
        <?php endforeach; ?>
</div>



