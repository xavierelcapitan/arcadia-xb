<!-- src/Views/admin/users/list.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->role ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
