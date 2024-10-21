<h1>Ajouter un animal</h1>

<form method="POST" action="/index.php?controller=animal&action=createAnimal" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Prénom de l'animal</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="race" class="form-label">Race</label>
        <input type="text" class="form-control" id="race" name="race" required>
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image de l'animal</label>
        <input type="file" class="form-control" id="image_url" name="image_url" required>
    </div>
    <div class="mb-3">
        <label for="habitat_id" class="form-label">Habitat</label>
        <select class="form-control" id="habitat_id" name="habitat_id" required>
            <!-- Boucle pour afficher les habitats disponibles -->
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat->id ?>"><?= htmlspecialchars($habitat->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
