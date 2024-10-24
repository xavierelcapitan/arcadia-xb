<h1>Modifier le Rapport de l'Habitat : <?= htmlspecialchars($habitat->name ?? 'Nom de l\'habitat non trouvé') ?></h1>


<p><strong>Nom de l'Habitat :</strong> <?= htmlspecialchars($habitat->name) ?></p>

<?php if ($report): ?>
    <p><strong>Avis du Vétérinaire :</strong> <?= nl2br(htmlspecialchars($report->vet_opinion)) ?></p>
    <p><strong>Améliorations à Apporter :</strong> <?= nl2br(htmlspecialchars($report->improvements)) ?></p>
<?php else: ?>
    <p>Aucun rapport disponible pour cet habitat.</p>
<?php endif; ?>

<!-- Montrer le bouton "Mettre à jour" pour vétérinaire et admin -->
<?php if ($user_role == 'veterinaire' || $user_role == 'admin'): ?>
    <a href="/index.php?controller=habitatReport&action=edit&habitat_id=<?= $habitat->id ?>" class="btn btn-primary">
        <?= $report ? 'Mettre à jour' : 'Ajouter un rapport' ?>
    </a>
<?php endif; ?>

<a href="/index.php?controller=habitat&action=listHabitats" class="btn btn-secondary">Retour</a>
