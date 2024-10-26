document.addEventListener("DOMContentLoaded", function () {
  const filterButton = document.getElementById("filter-button");
  const resetButton = document.getElementById("reset-button");

  // Charger les rapports initiaux
  loadReports();

  // Charger les rapports avec filtres quand on clique sur "Filtrer"
  filterButton.addEventListener("click", function () {
      const filters = {
          animalName: document.getElementById("animal-name").value,
          animalRace: document.getElementById("animal-race").value,
          reportDate: document.getElementById("report-date").value,
          healthStatus: document.getElementById("health-status").value,
      };
      loadReports(filters);
  });

  // Réinitialiser les filtres
  resetButton.addEventListener("click", function () {
      document.getElementById("animal-name").value = "";
      document.getElementById("animal-race").value = "";
      document.getElementById("report-date").value = "";
      document.getElementById("health-status").value = "";
      loadReports(); // Recharger sans filtres
  });
});

function loadReports(filters = {}) {
  fetch("/index.php?controller=veterinaryReport&action=getFilteredReports", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(filters),
  })
  .then(response => response.json())
  .then(reports => {
      displayReports(reports);
      updateStats(reports);
  })
  .catch(error => console.error("Erreur lors du chargement des rapports :", error));
}

function displayReports(reports) {
  const tbody = document.querySelector("#report-table tbody");
  tbody.innerHTML = ""; // Vider le tableau avant d'ajouter de nouvelles lignes

  reports.forEach(report => {
      const row = document.createElement("tr");

      row.innerHTML = `
          <td>${report.animal_name}</td>
          <td>${report.race}</td>
          <td>${report.habitat_name}</td>
          <td>${report.created_at}</td>
          <td>${report.health_status}</td>
          <td>${report.page_views || 0}</td>
          <td><a href="/index.php?controller=veterinaryReport&action=showReportDetails&id=${report.id}">Détails</a></td>
      `;
      
      tbody.appendChild(row);
  });
}

function updateStats(reports) {
  const totalReports = reports.length;
  const activeReports = reports.filter(report => report.health_status !== 'Mort').length;

  document.getElementById("total-reports").textContent = totalReports;
  document.getElementById("active-reports").textContent = activeReports;
}
