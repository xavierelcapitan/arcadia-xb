<!-- Views/layouts/default.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Tableau de bord</h1>
        <nav>
            <ul>
                <li><a href="/index.php?controller=admin&action=dashboard">Dashboard</a></li>
                <li><a href="/index.php?controller=auth&action=logout">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Inclusion du contenu de la page -->
        <?php if (isset($view)) {
            include $view;
        } ?>
    </main>

    <footer>
        <p>&copy; 2024 Arcadia</p>
    </footer>
</body>
</html>
