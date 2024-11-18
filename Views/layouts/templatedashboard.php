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

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="logo">
                <img src="/assets/images/pict/LOGOARCADIAFOOTERXAVIER.png" alt="Logo">
            </div>
           
            <ul class="menu">
                <li class="menu-item <?= $activePage === 'dashboard' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=dashboard">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'users' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=users">
                        <i class="fas fa-users"></i> Utilisateurs
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'horaires' ? 'active' : '' ?>">
                    <a href="/index.php?controller=admin&action=horaires">
                        <i class="fas fa-clock"></i> Horaires
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'services' ? 'active' : '' ?>">
                    <a href="/index.php?controller=services&action=listservices">
                        <i class="fas fa-concierge-bell"></i> Services
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'animals' ? 'active' : '' ?>">
                    <a href="/index.php?controller=animal&action=listAnimals">
                        <i class="fas fa-paw"></i> Liste des Animaux
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'habitats' ? 'active' : '' ?>">
                    <a href="/index.php?controller=habitat&action=listHabitats">
                        <i class="fas fa-tree"></i> Habitats
                    </a>
                </li>
                <li class="menu-item <?= $activePage === 'reviews' ? 'active' : '' ?>">
                    <a href="/index.php?controller=review&action=moderation">
                        <i class="fas fa-comments"></i> Modération des Avis
                    </a>
                </li>
            </ul>
            <div class="logout">
                <a href="/index.php?controller=auth&action=logout" class="menu-item logout">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            </div>
        </aside>

        <!-- Main Content -->
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/xxwj3ndzqvtjri3i2yctdbu6s1pzq97jj4hs1d5a2fdgvuu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Scripts personnalisés -->
    <script src="/assets/js/burger-menu.js"></script>
    <script src="/assets/js/datatables_setup.js"></script>
    <script src="/assets/js/filters_veterinary_reports.js"></script>
    <script src="/assets/js/charts_dashboard.js"></script>
    <script src="/assets/js/animal_count.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea.tinymce', 
        plugins: 'advlist autolink link image lists',
        toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist|',
        menubar: false, 
        valid_elements: '*[*]', 
        forced_root_block: '', 
        content_css: false 
    });
</script>

</body>
</html>
