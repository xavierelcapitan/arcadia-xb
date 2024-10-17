<!-- Views/admin/dashboard.php -->


<header class="admin-header">
    <h1>Tableau de bord - Admin</h1>
</header>

<main>
<section class="admin-content">
    <!-- CONTENU DYNAMIQUE SPÉCIFIQUE AU TABLEAU DE BORD -->
    <?php if (isset($content)) : ?>
        <p><?= $content ?></p>
    <?php else : ?>
        <p>Bienvenue sur le tableau de bord administrateur.</p>
    <?php endif; ?>
</section>

</main>
