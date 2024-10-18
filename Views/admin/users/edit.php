<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier un utilisateur</h1>
        <form method="post" action="/index.php?controller=User&action=update&id=<?= $user->id ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($user->first_name) ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($user->last_name) ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" <?= $user->role === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= $user->role === 'user' ? 'selected' : '' ?>>Utilisateur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
</body>
</html>
