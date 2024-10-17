<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des utilisateurs</h1>
        <a href="/index.php?controller=admin&action=createUser" class="btn btn-success mb-3">Ajouter un utilisateur</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->email) ?></td>
                    <td><?= htmlspecialchars($user->last_name) ?></td>
                    <td><?= htmlspecialchars($user->first_name) ?></td>
                    <td><?= htmlspecialchars($user->role) ?></td>
                    <td>
                        <a href="/index.php?controller=admin&action=editUser&id=<?= $user->id ?>" class="btn btn-primary">Modifier</a>
                        <a href="/index.php?controller=admin&action=deleteUser&id=<?= $user->id ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
