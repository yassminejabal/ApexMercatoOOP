<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin ApexMercato</title>
    <link rel="stylesheet" href="../css.css">

  <style>
    
  </style>
</head>
<body>

  <header>
    <h1>ApexMercato Admin</h1>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="/html/admin_dashboard.php">Dashboard</a>
      <a href="logout.php">Déconnexion</a>
      <a href="../crud_equipe/afficher_Equipe.php">Tous les l'équipe </a>
      <a href="../crud_equipe/modifierBudger.php">Modifier badget</a>
      <a href="../coatch/coatch.php">Ajouter un coutch A une equipe</a>
      <a href="../coatch/affichagecoutch.php">afficher les coatch</a>

    </nav>
  </header>

  <main>
    <form action="../crud_equipe/ajouteEquipe.php" method="POST">
      <h2>Gérer une Équipe</h2>

      <label for="name">Nom de l'équipe :</label>
      <input type="text" id="name" name="name" placeholder="Ex: FC Apex" required>

      <label for="manager_name">Nom du manager :</label>
      <input type="text" id="manager_name" name="manager_name" placeholder="Ex: Zinedine Zidane" required>

      <label for="badget">Budget (€) :</label>
      <input type="number" id="badget" name="badget" min="0" placeholder="Ex: 100000000" required>

    <button  type="submit" name="submit">Enregistrer l'équipe</button>  
    </form>
  </main>

  <footer>
    &copy; 2025 ApexMercato | Tous droits réservés
  </footer>

</body>
</html>
<?php 