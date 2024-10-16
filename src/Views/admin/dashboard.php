<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Arcadia</title>
    
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Public/assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar Menu -->
        <aside class="admin-sidebar">
            <div class="logo">
                <img src="/Public/assets/img/logo.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="/admin/dashboard">Dashboard</a></li>
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
                <!-- Section Utilisateurs -->
                <div class="admin-section">
                    <h2>Gestion des Utilisateurs</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Profil</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Boucle PHP pour afficher les utilisateurs -->
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user->email) ?></td>
                                <td>Profil (Filtre)</td>
                                <td><a href="/admin/editUser/<?= $user->id ?>" class="btn btn-primary">Modifier</a></td>
                                <td><a href="/admin/deleteUser/<?= $user->id ?>" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Section Habitats -->
                <div class="admin-section">
                    <h2>Gestion des Habitats</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <h3>Savane</h3>
                                <p>Informations sur l'habitat...</p>
                                <a href="/admin/editHabitat/1" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h3>Marais</h3>
                                <p>Informations sur l'habitat...</p>
                                <a href="/admin/editHabitat/2" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card"><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Arcadia</title>
    
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Public/assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar Menu -->
        <aside class="admin-sidebar">
            <div class="logo">
                <img src="/Public/assets/img/logo.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="/admin/dashboard">Dashboard</a></li>
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
                <!-- Section Utilisateurs -->
                <div class="admin-section">
                    <h2>Gestion des Utilisateurs</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Profil</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user->email) ?></td>
                                <td>Profil (Filtre)</td>
                                <td><a href="/admin/editUser/<?= $user->id ?>" class="btn btn-primary">Modifier</a></td>
                                <td><a href="/admin/deleteUser/<?= $user->id ?>" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Section Habitats -->
                <div class="admin-section">
                    <h2>Gestion des Habitats</h2>
                    <div class="row">
                        <?php foreach ($habitats as $habitat): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <h3><?= htmlspecialchars($habitat->name) ?></h3>
                                <p><?= htmlspecialchars($habitat->description) ?></p>
                                <a href="/admin/editHabitat/<?= $habitat->id ?>" class="btn btn-primary">Modifier</a>
                                <a href="/admin/deleteHabitat/<?= $habitat->id ?>" class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script src="/Public/assets/js/admin.js"></script>
</body>
</html>

                                <h3>Jungle</h3>
                                <p>Informations sur l'habitat...</p>
                                <a href="/admin/editHabitat/3" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

   <!-- Bootstrap JS via CDN -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script src="/Public/assets/js/admin.js"></script>
</body>
</html>
