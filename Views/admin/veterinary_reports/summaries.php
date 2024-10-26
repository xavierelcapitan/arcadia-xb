<div class="container my-4">
    <h1 class="text-center">Résumé des Rapports Vétérinaires</h1>

    <!-- Formulaire de filtres -->
    <form id="filterForm" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <select class="form-control" name="animalName">
                    <option value="">Nom de l'animal</option>
                    <?php foreach ($animalNames as $name): ?>
                        <option value="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="animalRace">
                    <option value="">Race de l'animal</option>
                    <?php foreach ($animalRaces as $race): ?>
                        <option value="<?= htmlspecialchars($race) ?>"><?= htmlspecialchars($race) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" class="form-control" name="reportDate" placeholder="Date du rapport">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="healthStatus">
                    <option value="">État de santé</option>
                    <?php foreach ($healthStatuses as $status): ?>
                        <option value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-3" onclick="applyFilters()">Filtrer</button>
    </form>

    <!-- Tableau des rapports -->
    <div id="reportTable">
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>

                <th>Nom de l'animal</th>
                <th>Vues</th>
                <th>Race</th>
                <th>Habitat</th>
                <th>Date du rapport</th>
                <th>État de santé</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= htmlspecialchars($report['animal_name']) ?></td>
                    <td>vues à faire</td>
                    <td><?= htmlspecialchars($report['race']) ?></td>
                    <td><?= htmlspecialchars($report['habitat_name']) ?></td>
                    <td>
                        <?php
                        $date = new DateTime($report['last_checkup_date']);
                        echo $date->format('d-m-y');
                        ?>
                    </td>
                    <td><?= htmlspecialchars($report['health_status']) ?></td>
                   
                    <td class="text-center">
                        <a href="/index.php?controller=veterinaryReport&action=showReportDetails&id=<?= $report['id'] ?>" 
                           class="btn btn-sm btn-info" title="Voir les détails">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
