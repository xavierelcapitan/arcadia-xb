<h1>Ajouter un rapport vétérinaire</h1>

<form method="POST" action="/index.php?controller=veterinaryReport&action=createReport">
    <input type="hidden" name="animal_id" value="<?= htmlspecialchars($animal->id) ?>">
    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>"> <!-- Le vétérinaire connecté -->

    <div class="mb-3">
        <label for="checkup_date" class="form-label">Date de passage</label>
        <input type="date" class="form-control" id="checkup_date" name="checkup_date" required>
    </div>
    <div class="mb-3">
        <label for="health_status" class="form-label">État de santé</label>
        <textarea class="form-control" id="health_status" name="health_status" required></textarea>
    </div>
    <div class="mb-3">
        <label for="food_given" class="form-label">Nourriture donnée</label>
        <input type="text" class="form-control" id="food_given" name="food_given" required>
    </div>
    <div class="mb-3">
        <label for="food_quantity" class="form-label">Quantité de nourriture (en grammes)</label>
        <input type="number" class="form-control" id="food_quantity" name="food_quantity" required>
    </div>
    <div class="mb-3">
        <label for="recommendations" class="form-label">Recommandations supplémentaires</label>
        <textarea class="form-control" id="recommendations" name="recommendations"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le rapport</button>
</form>
