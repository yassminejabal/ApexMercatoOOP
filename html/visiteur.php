<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Visiteur Dashboard - ApexMercato</title>
    <link rel="stylesheet" href="../css.css">
</head>
<body>

  <header>Visiteur Dashboard - ApexMercato</header>

  <nav>
    <a href="visitor_dashboard.php">Accueil</a>
    <a href="search_players.php">Rechercher Joueur</a>
    <a href="history_transfers.php">Historique Public</a>
  </nav>

  <main>
    <h2>Liste des Joueurs (Public)</h2>

    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Pseudo</th>
          <th>Rôle</th>
          <th>Nationalité</th>
          <th>Équipe</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>JDozer</td>
          <td>Attaquant</td>
          <td>Française</td>
          <td>FC Apex</td>
          <td class="actions">Lecture seule</td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>JSmith</td>
          <td>Milieu</td>
          <td>Anglaise</td>
          <td>FC Mercato</td>
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
