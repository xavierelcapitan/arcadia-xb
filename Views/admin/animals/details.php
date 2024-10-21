<h1>Détails de l'animal</h1>

<div>
    <h2><?= htmlspecialchars($animal->name) ?></h2>
    <p><strong>Race : </strong><?= htmlspecialchars($animal->race) ?></p>
    <p><strong>Habitat : </strong><?= htmlspecialchars($animal->habitat_name) ?></p>
    <img src="<?= htmlspecialchars($animal->image_url) ?>" alt="Image de l'animal" width="200">
</div>

<h2>Rapports vétérinaires</h2>
<?php if (!empty($veterinary_reports)): ?>
    <?php foreach ($veterinary_reports as $report): ?>
        <div class="report">
            <p><strong>Date du passage : </strong><?= htmlspecialchars($report->checkup_date) ?></p>
            <p><strong>État de santé : </strong><?= htmlspecialchars($report->health_status) ?></p>
            <p><strong>Nourriture donnée : </strong><?= htmlspecialchars($report->food_given) ?></p>
            <p><strong>Quantité de nourriture : </strong><?= htmlspecialchars($report->food_quantity) ?> grammes</p>
            <p><strong>Recommandations : </strong><?= htmlspecialchars($report->recommendations) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun rapport vétérinaire disponible pour cet animal.</p>
<?php endif; ?>
