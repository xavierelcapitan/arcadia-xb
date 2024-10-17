<h2>Gestion des Utilisateurs</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user->last_name) ?></td>
                <td><?= htmlspecialchars($user->first_name) ?></td>
                <td><?= htmlspecialchars($user->role) ?></td>
                <td>
                    <a href="/admin/users/edit/<?= $user->id ?>" class="btn btn-primary">Modifier</a>
                    <a href="/admin/users/delete/<?= $user->id ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/users/create" class="btn btn-success">Ajouter un utilisateur</a>
