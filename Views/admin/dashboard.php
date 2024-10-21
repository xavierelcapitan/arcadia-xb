<!-- Views/admin/dashboard.php -->

<header class="admin-header">
    <h1>Section 1 à définir</h1>
</header>
<main>
    <section class="admin-content">
        <!-- CONTENU DYNAMIQUE SPÉCIFIQUE AU TABLEAU DE BORD -->
        <p>Contenu dynamique spécifique au tableau de bord.</p>
        <!-- Canvas pour le graphique -->
<canvas id="consultationsChart" width="400" height="200"></canvas>

<script>
  var ctx = document.getElementById('consultationsChart').getContext('2d');
  var consultationsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($animal_names) ?>, // Noms des animaux
      datasets: [{
        label: 'Nombre de consultations',
        data: <?= json_encode($consultation_counts) ?>, // Nombre de consultations
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
</script>
    </section>
</main>



