// Initialisation de Swiper pour le slider des avis page HOMe
const swiper = new Swiper('.swiper-container', {
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
      el: '.swiper-pagination',
      clickable: true,
  },
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },
  breakpoints: {
      // Affiche 3 slides en même temps pour les écrans de 768px et plus
      768: {
          slidesPerView: 3,
          spaceBetween: 20,
      },
  },
});
