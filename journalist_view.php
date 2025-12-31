<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Journaliste Dashboard - ApexMercato</title>
  <link rel="stylesheet" href="css.css">
  <style>
    
  </style>
</head>
<body>

  <header>Journaliste Dashboard - ApexMercato</header>

  <nav>
    <a href="journaliste_dashboard.php">Accueil</a>
    <a href="report_transfers.php">Rapports</a>
    <a href="compare_players.php">Comparer Joueurs</a>
    <a href="export_data.php">Exporter</a>
    <a href="logout.php">Déconnexion</a>
  </nav>

  <main>
    <h2>Liste des Joueurs et Détails Financiers (Lecture Seule)</h2>

    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Pseudo</th>
          <th>Équipe</th>
          <th>Salaire (€)</th>
          <th>Clause de rachat (€)</th>
          <th>Budget Équipe (€)</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>JDozer</td>
          <td>FC Apex</td>
          <td>50,000</td>
          <td>200,000</td>
          <td>1,000,000</td>
          <td class="actions">Lecture seule</td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>JSmith</td>
          <td>FC Mercato</td>
          <td>60,000</td>
          <td>250,000</td>
          <td>900,000</td>
          <td class="actions">Lecture seule</td>
        </tr>
        <!-- Générer dynamiquement avec PHP ici -->
      </tbody>
    </table>
  </main>

  <footer>
    © 2025 - ApexMercato - Tous droits réservés
  </footer>

</body>
</html>
