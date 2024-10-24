<h1>Modifier le Rapport de l'Habitat : <?= htmlspecialchars($habitat->name ?? 'Nom de l\'habitat non trouvé') ?></h1>


<form action="/index.php?controller=habitatReport&action=create&habitat_id=<?= htmlspecialchars($habitat->id ?? '') ?>" method="POST">
    <div class="form-group">
        <label for="vet_opinion">Avis du Vétérinaire</label>
        <textarea id="vet_opinion" name="vet_opinion" class="form-control tinymce" rows="5"><?= htmlspecialchars($report->vet_opinion ?? '') ?></textarea>
    </div>

    <div class="form-group">
        <label for="improvements">Améliorations à Apporter</label>
        <textarea id="improvements" name="improvements" class="form-control tinymce" rows="5"><?= htmlspecialchars($report->improvements ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="/index.php?controller=habitat&action=listHabitats" class="btn btn-secondary">Annuler</a>
</form>
