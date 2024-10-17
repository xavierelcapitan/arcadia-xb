
<h2>Liste des utilisateurs</h2>
<a href="/index.php?controller=users&action=create" class="btn btn-success">Ajouter un utilisateur</a>
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Rôle</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        <!-- Affichage des utilisateurs ici -->
    </tbody>
</table>




<div class="admin-section">
    <h2>Gestion des Utilisateurs</h2>
    <a href="/index.php?controller=admin&action=createUser" class="btn btn-success">Ajouter un utilisateur</a>
    <table class="table table-striped">
        <!-- Tableau existant des utilisateurs -->
    </table>
</div>

<div class="admin-section">
    <h2>Gestion des Utilisateurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Profil</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle PHP pour afficher les utilisateurs -->
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->email) ?></td>
                    <td>Profil (Filtre)</td>
                    <td><a href="/admin/editUser/<?= $user->id ?>" class="btn btn-primary">Modifier</a></td>
                    <td><a href="/admin/deleteUser/<?= $user->id ?>" class="btn btn-danger">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

