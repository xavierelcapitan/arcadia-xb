<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="/assets/css/admin.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
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
                    <li><a href="/index.php?controller=habitat&action=listHabitats">Habitats</a></li>
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

    <!-- jQuery (obligatoire pour DataTables, TinyMCE, etc.) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/xxwj3ndzqvtjri3i2yctdbu6s1pzq97jj4hs1d5a2fdgvuu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea.tinymce', // Utilise un sélecteur de classe spécifique
    plugins: 'advlist autolink lists link image charmap print preview anchor',
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    setup: function(editor) {
      editor.on('change', function() {
        tinymce.triggerSave();  // Forcer la sauvegarde avant soumission du formulaire
      });
    }
  });
</script>




    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts personnalisés -->
    <script src="/assets/js/burger-menu.js"></script>
    <script src="/assets/js/datatables_setup.js"></script>
    <script src="/assets/js/filters_veterinary_reports.js"></script>
    <script src="/assets/js/charts_dashboard.js"></script>
</body>
</html>
