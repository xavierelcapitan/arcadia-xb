<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Arcadia</title>
    <link rel="stylesheet" href="/assets/css/admin.css"> <!-- Le bon chemin -->
</head>
<body>

<div class="admin-container">
    <nav class="admin-sidebar">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/users/list">Utilisdfsdfsdfsateurs</a></li>
            <li><a href="/admin/hours/list">Horaires</a></li>
            <li><a href="/admin/services/list">Services</a></li>
            <li><a href="/admin/animals/list">Gestion des Animaux</a></li>
            <li><a href="/admin/habitats/list">Habitats</a></li>
            <li><a href="/admin/stats">Stats</a></li>
            <li><a href="/admin/reports/list">Comptes Rendus</a></li>
            <li><a href="/admin/logout">Log Out</a></li>
        </ul>
    </nav>

    <div class="admin-main">
        <div class="admin-header">
            <h1>Tableau de bord - Administration</h1>
        </div>

        <div class="admin-content">
            <!-- Le contenu sera injecté ici -->
            <?= $content ?? '' ?>
        </div>
    </div>
</div>

</body>
</html>
