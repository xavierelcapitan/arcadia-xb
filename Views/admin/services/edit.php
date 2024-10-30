<!-- Views/admin/services/edit.php -->

<form action="/index.php?controller=services&action=editService&id=<?= $service->id ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nom du Service</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($service->name) ?>" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" required><?= htmlspecialchars($service->description) ?></textarea>

    <label for="location">Emplacement</label>
    <input type="text" id="location" name="location" value="<?= htmlspecialchars($service->location) ?>" required>

    <label for="image_path">Image actuelle</label><br>
    <?php if ($service->image_path): ?>
        <img src="<?= $service->image_path ?>" alt="Image de <?= htmlspecialchars($service->name) ?>" style="width: 100px; height: 100px;"><br>
    <?php endif; ?>
    <input type="file" id="image_path" name="image_path"><br>

    <button type="submit">Mettre à jour</button>
</form>

