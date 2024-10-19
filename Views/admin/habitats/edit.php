<h1>Modifier un habitat</h1>

<form method="POST" action="/index.php?controller=habitat&action=editHabitat&id=<?= $habitat->id ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($habitat->name) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($habitat->description) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">URL de l'image</label>
        <input type="text" class="form-control" id="image_url" name="image_url" value="<?= htmlspecialchars($habitat->image_url) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
