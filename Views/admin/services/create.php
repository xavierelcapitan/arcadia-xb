<!-- Views/admin/services/create.php -->

<form method="POST" action="/index.php?controller=services&action=createService">
    <div class="form-group">
        <label>Nom du Service</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>Emplacement</label>
        <input type="text" name="location" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
</form>
