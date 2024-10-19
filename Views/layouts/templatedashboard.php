<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>

    <!-- Sidebar and Content Wrapper -->
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <aside class="admin-sidebar">
                <div class="logo">
                    <img src="/assets/images/logo.png" alt="Logo">
                </div>

                <ul>
                    <li><a href="/index.php?controller=admin&action=dashboard">Dashboard</a></li>
                    <li><a href="/index.php?controller=admin&action=users">Utilisateurs</a></li>
                    <li><a href="/index.php?controller=admin&action=horaires">Horaires</a></li>
                    <li><a href="/index.php?controller=admin&action=services">Services</a></li>
                    <li><a href="/index.php?controller=admin&action=animals">Gestion des Animaux</a></li>
                    <li><a href="/index.php?controller=habitat&action=listHabitats">Habitats</a>
                    </li>
                    <li><a href="/index.php?controller=admin&action=stats">Stats</a></li>
                    <li><a href="/index.php?controller=admin&action=reports">Comptes Rendus</a></li>
                    <li><a href="/index.php?controller=auth&action=logout">Log Out</a></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="admin-main">
                <!-- Header (dynamic) -->
                <header class="admin-header">
                    <h1><?= $pageTitle ?? 'Tableau de bord' ?></h1>
                    <button class="burger-menu" id="burgerMenu">
                        &#9776;
                    </button>
                </header>

                <!-- Main content (dynamic) -->
                <section class="admin-content">
                <?php require_once $view; ?>
                </section>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container">
                        <p class="text-center">© 2024 - Admin Panel</p>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/burger-menu.js"></script>
</body>
</html>
