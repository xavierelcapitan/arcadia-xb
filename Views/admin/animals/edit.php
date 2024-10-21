<h1>Modifier l'animal</h1>

<form method="POST" action="/index.php?controller=animal&action=editAnimal&id=<?= $animal->id ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Prénom de l'animal</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($animal->name) ?>" required>
    </div>
    <div class="mb-3">
        <label for="race" class="form-label">Race</label>
        <input type="text" class="form-control" id="race" name="race" value="<?= htmlspecialchars($animal->race) ?>" required>
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image de l'animal</label>
        <input type="file" class="form-control" id="image_url" name="image_url">
        <img src="<?= htmlspecialchars($animal->image_url) ?>" alt="Image de l'animal" width="100">
    </div>
    <div class="mb-3">
        <label for="habitat_id" class="form-label">Habitat</label>
        <select class="form-control" id="habitat_id" name="habitat_id" required>
            <!-- Boucle pour afficher les habitats disponibles -->
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat->id ?>" <?= $animal->habitat_id === $habitat->id ? 'selected' : '' ?>><?= htmlspecialchars($habitat->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
