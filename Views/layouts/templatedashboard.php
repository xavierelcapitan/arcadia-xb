<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <!-- Menu pour mobile -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/assets/images/pict/LOGOARCADIAFOOTERXAVIER.png" alt="Logo" class="logo-mobile">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobileMenu">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'dashboard' ? 'active' : '' ?>" href="/index.php?controller=admin&action=dashboard"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'users' ? 'active' : '' ?>" href="/index.php?controller=admin&action=users"><i class="fas fa-users"></i> Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'horaires' ? 'active' : '' ?>" href="/index.php?controller=admin&action=horaires"><i class="fas fa-clock"></i> Horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'services' ? 'active' : '' ?>" href="/index.php?controller=services&action=listservices"><i class="fas fa-concierge-bell"></i> Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'animals' ? 'active' : '' ?>" href="/index.php?controller=animal&action=listAnimals"><i class="fas fa-paw"></i> Liste des Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'habitats' ? 'active' : '' ?>" href="/index.php?controller=habitat&action=listHabitats"><i class="fas fa-tree"></i> Habitats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'reviews' ? 'active' : '' ?>" href="/index.php?controller=review&action=moderation"><i class="fas fa-comments"></i> Modération des Avis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?controller=auth&action=logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dashboard">
        <!-- Sidebar pour desktop -->
        <aside class="admin-sidebar d-none d-lg-flex">
            <div class="logo">
                <img src="/assets/images/pict/LOGOARCADIAFOOTERXAVIER.png" alt="Logo">
            </div>
            <ul class="menu">
                <li class="menu-item <?= $activePage === 'dashboard' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="menu-item <?= $activePage === 'users' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=users"><i class="fas fa-users"></i> Utilisateurs</a>
                </li>
                <li class="menu-item <?= $activePage === 'horaires' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=horaires"><i class="fas fa-clock"></i> Horaires</a>
                </li>
                <li class="menu-item <?= $activePage === 'services' ? 'active' : '' ?>">
                    <a href="/index.php?controller=services&action=listservices"><i class="fas fa-concierge-bell"></i> Services</a>
                </li>
                <li class="menu-item <?= $activePage === 'animals' ? 'active' : '' ?>">
                    <a href="/index.php?controller=animal&action=listAnimals"><i class="fas fa-paw"></i> Liste des Animaux</a>
                </li>
                <li class="menu-item <?= $activePage === 'habitats' ? 'active' : '' ?>">
                    <a href="/index.php?controller=habitat&action=listHabitats"><i class="fas fa-tree"></i> Habitats</a>
                </li>
                <li class="menu-item <?= $activePage === 'reviews' ? 'active' : '' ?>">
                    <a href="/index.php?controller=review&action=moderation"><i class="fas fa-comments"></i> Modération des Avis</a>
                </li>
            </ul>
            <div class="logout">
                <a href="/index.php?controller=auth&action=logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </aside>

        <!-- Contenu principal -->
        <main class="admin-main">
            <header class="admin-header">
                <h1><?= $pageTitle ?? 'Tableau de bord' ?></h1>
            </header>
            <section class="admin-content">
                <?php 
                if (isset($view)) {
                    if (file_exists($view)) {
                        require_once $view;
                    } else {
                        echo "Vue non trouvée : $view";
                    }
                } else {
                    echo "Aucune vue spécifiée.";
                }
                ?>
            </section>
            <footer class="footer">
                <p class="text-center">© 2024 - ARCADIA BX - Tableau de bord Admin</p>
            </footer>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
