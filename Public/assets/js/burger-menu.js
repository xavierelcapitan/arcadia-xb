document.addEventListener("DOMContentLoaded", function() {
  console.log("DOM entièrement chargé et analysé");
  const burgerMenu = document.getElementById("burgerMenu");
  
  if (burgerMenu) {
      console.log("L'élément burgerMenu est trouvé.");
      const sidebar = document.querySelector(".admin-sidebar");
      
      burgerMenu.addEventListener("click", function() {
          sidebar.classList.toggle("active");
          console.log("Menu burger cliqué, sidebar toggled.");
      });
  } else {
      console.log("L'élément burgerMenu n'existe pas sur cette page.");
  }
});
