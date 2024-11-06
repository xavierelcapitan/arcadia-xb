<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    
    <!-- Inclure Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    <!-- Inclure le CSS pour la page d'accueil -->
    <link rel="stylesheet" href="/assets/css/home_styles.css">
</head>
<body>
    <h1>Bienvenue sur la page d'accueil d'Arcadia</h1>
    <ul>
        <li><a href="/index.php?controller=admin&action=dashboard">Accéder au Dashboard</a></li>
    </ul>

    <!-- Bloc d'Avis -->
    <h2>Ce que disent nos visiteurs</h2>
    <div class="reviews-container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                // Inclusion du contrôleur et récupération des avis
                $reviewController = new \App\Controllers\ReviewController();
                $approvedReviews = $reviewController->getApprovedReviews();
                
                foreach ($approvedReviews as $review): ?>
                    <div class="swiper-slide review-slide">
                        <h3><?= htmlspecialchars($review->visitor_pseudo) ?></h3>
                        <p><?= htmlspecialchars($review->comment) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Pagination et navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Formulaire pour poster un avis -->
    <h2>Laissez un avis</h2>
    <form action="/index.php?controller=review&action=submitReview" method="POST">
        <label for="visitor_pseudo">Pseudo :</label>
        <input type="text" id="visitor_pseudo" name="visitor_pseudo" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="comment">Votre avis :</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Envoyer</button>
    </form>

    <!-- Inclure Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Inclure le
