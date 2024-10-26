// Public/assets/js/charts_dashboard.js

document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById("myCanvasElementId"); // Remplacez par l'ID correct de votre élément canvas
    if (canvas) {
        const ctx = canvas.getContext("2d");
        // Votre logique pour travailler avec ctx
    } else {
        console.warn("Canvas élément non trouvé !");
    }
});


var ctx = document.getElementById('consultationsChart').getContext('2d');
var consultationsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: animalNames,  // Ceci doit être injecté dynamiquement par PHP
        datasets: [{
            label: 'Nombre de consultations',
            data: consultationCounts,  // Ceci doit être injecté dynamiquement par PHP
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
