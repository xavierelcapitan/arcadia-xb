<!-- Views/layouts/default.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="/assets/css/variables.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/home_styles.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <header>
     
        <nav>
          
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
        <ul>
                <li><a href="/index.php?controller=admin&action=dashboard">Dashboard</a></li>
                <li><a href="/index.php?controller=auth&action=logout">Déconnexion</a></li>
            </ul>
    </footer>
</body>
</html>
