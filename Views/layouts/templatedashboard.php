<!-- Views/layouts/templatedashboard.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="admin-sidebar col-md-2">
                <div class="logo">
                    <img src="/assets/images/logo.png" alt="Logo">
                </div>
                <ul>
                    <li><a href="/index.php?controller=admin&action=dashboard">Dashboard</a></li>
                    <li><a href="/index.php?controller=admin&action=users">Utilisateurs</a></li>
                    <li><a href="/index.php?controller=admin&action=horaires">Horaires</a></li>
                    <li><a href="/index.php?controller=admin&action=services">Services</a></li>
                    <li><a href="/index.php?controller=admin&action=animals">Gestion des Animaux</a></li>
                    <li><a href="/index.php?controller=admin&action=habitats">Habitats</a></li>
                    <li><a href="/index.php?controller=admin&action=stats">Stats</a></li>
                    <li><a href="/index.php?controller=admin&action=reports">Comptes Rendus</a></li>
                    <li><a href="/index.php?controller=auth&action=logout">Log Out</a></li>
                </ul>
            </aside>

            <!-- Inclusion du contenu dynamique -->
            <div class="admin-main col-md-10">
                <?php require_once $view; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/admin.js"></script>
</body>
</html>