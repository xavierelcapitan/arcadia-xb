<!-- Views/admin/Animals/create.php -->
<h1>Ajouter un animal</h1>
<form method="POST" action="/index.php?controller=animal&action=createAnimal" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Prénom de l'animal</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
    <label for="image" class="form-label">Image de l'animal</label>
    <input type="file" class="form-control" id="image" name="image">
</div>


    <div class="mb-3">
        <label for="habitat" class="form-label">Habitat</label>
        <select class="form-control" id="habitat_id" name="habitat_id">
            <option value="">Sélectionnez un habitat</option>
            <?php foreach ($habitats as $habitat) : ?>
                <option value="<?= $habitat->id; ?>"><?= $habitat->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="race" class="form-label">Race</label>
        <select class="form-control" id="race" name="race">
            <option value="">Sélectionnez une race</option>
            <?php foreach ($races as $race): ?>
                <option value="<?= htmlspecialchars($race->race) ?>"><?= htmlspecialchars($race->race) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
    <label for="food_type" class="form-label">Type de nourriture</label>
    <select class="form-control" id="food_type" name="food_type">
        <option value="">Sélectionnez un type de nourriture</option>
        <?php foreach ($foodTypes as $foodType): ?>
            <option value="<?= htmlspecialchars($foodType->food_type) ?>"><?= htmlspecialchars($foodType->food_type) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" class="form-control mt-2" id="new_food_type" name="new_food_type" placeholder="Ajouter un nouveau type de nourriture">
</div>

    <div class="mb-3">
    <label for="food_quantity" class="form-label">Quantité de nourriture (g/jour)</label>
    <input type="number" class="form-control" id="food_quantity" name="food_quantity" min="0">
</div>


    <div class="mb-3">
        <label for="age" class="form-label">Âge</label>
        <input type="number" class="form-control" id="age" name="age" required>
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Poids (en kg)</label>
        <input type="number" class="form-control" id="weight" name="weight" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>




