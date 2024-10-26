<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Lien vers Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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

                   
                    
                   
                    
                </ul>
                
                    <hr>
    <h4>Gestion des Animaux</h4>
    <ul>
        <li><a href="/index.php?controller=animal&action=listAnimals">Liste des Animaux</a></li>
        <li><a href="/index.php?controller=habitat&action=listHabitats">Habitats</a></li>

        <li><a href="/index.php?controller=veterinaryReport&action=summaries">Résumé des Rapports</a></li>


        <li><a href="/index.php?controller=admin&action=stats">Stats</a></li>
    </ul>
</li>

<div>
<a href="/index.php?controller=auth&action=logout">Log Out</a>
</div>



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
                <?php // Vérifier que $view est défini
if (isset($view)) {
    if (file_exists($view)) {
        require_once $view;
    } else {
        echo "Vue non trouvée : $view";
    }
} else {
    echo "Aucune vue spécifiée.";
}?>
                </section>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container">
                        <p class="text-center">© 2024 - Tableau de bord Admin</p>
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
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/xxwj3ndzqvtjri3i2yctdbu6s1pzq97jj4hs1d5a2fdgvuu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea.tinymce', 
    plugins: 'lists', 
    toolbar: 'undo redo | bold | alignleft aligncenter alignright alignjustify | bullist numlist', 
    menubar: false, 
    valid_styles: {
      '*': 'text-align' 
    },
    setup: function(editor) {
      editor.on('change', function() {
        tinymce.triggerSave();  
      });
    },
    content_css: false, 
    forced_root_block: '', 
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
    <script src="/Public/assets/js/summaries.js"></script>
</body>
</html>
