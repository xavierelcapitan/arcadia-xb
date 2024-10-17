<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BX-Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>

<body>

    <div class="admin-container">
        <!-- Sidebar Menu -->
        <aside class="admin-sidebar">
            <div class="logo">
                <img src="/Public/assets/img/logo.png" alt="Logo">
            </div>
            <nav>
                <h4>Dasboard</h4>
                <ul>
                    <li><a href="/admin/users">Utilisateurs</a></li>
                    <li><a href="/admin/hours">Horaires</a></li>
                    <li><a href="/admin/services">Services</a></li>
                    <li><a href="/admin/animals">Gestion des Animaux</a></li>
                    <li><a href="/admin/habitats">Habitats</a></li>
                    <li><a href="/admin/stats">Stats</a></li>
                    <li><a href="/admin/reports">Comptes Rendus</a></li>
                    <li><a href="/admin/logout">Log Out</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="admin-main">
            <header class="admin-header">
                <h1>Tableau de bord - Administration</h1>
            </header>

            <section class="admin-content">
                <!-- CONTENU DYNAMIQUE -->
              
                <?php echo $content; ?>
                
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="/Public/assets/js/admin.js"></script>
</body>
</html>