
<div class="container">
    <h1 class="display-1">Bienvenue sur Arcadia</h1>
    <p class="text-content">Découvrez ce que disent nos visiteurs et explorez nos services.</p>
</div>

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
    <!-- Inclure le script JavaScript spécifique pour le slider des avis -->
<script src="/assets/js/home_slider.js"></script>

