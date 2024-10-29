<!-- Views/admin/services/edit.php -->

<form method="POST" action="/index.php?controller=services&action=editService&id=<?= $service->id ?>">
    <div class="form-group">
        <label>Nom du Service</label>
        <input type="text" name="name" value="<?= htmlspecialchars($service->name) ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required><?= htmlspecialchars($service->description) ?></textarea>
    </div>
    <div class="form-group">
        <label>Emplacement</label>
        <input type="text" name="location" value="<?= htmlspecialchars($service->location) ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
