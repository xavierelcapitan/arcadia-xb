<h1>Créer un habitat</h1>

<form method="POST" action="/index.php?controller=habitat&action=createHabitat" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>


    </div>

    
    <div class="mb-3">
        <label for="image_url" class="form-label">Image</label>
        <input type="file" class="form-control" id="image_url" name="image_url" required>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<!-- Script TinyMCE -->
<script src="https://cdn.tiny.cloud/1/xxwj3ndzqvtjri3i2yctdbu6s1pzq97jj4hs1d5a2fdgvuu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#description'
  });
</script>



<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
