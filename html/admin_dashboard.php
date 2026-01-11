<?php
namespace OOP2\html;
include "../autoloding.php";
use OOP2\Databese;
use OOP2\lesclass\joueur;
$connection = databese::ConnexionDataBase();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - ApexMercato</title>
  <link rel="stylesheet" href="../css.css">

</head>

<body>

  <header>Admin Dashboard - ApexMercato</header>

  <nav>
    <a href="admin_dashboard.php">Accueil</a>
    <a href="../crud_jeur/joueur.php">Ajouter Joueur</a>
    <a href="equipe.php">Gérer Équipes</a>
    <!-- <a href="../transforme/transfert.php">Transfert</a> -->
    <a href="../crud_equipe/afficher_Equipe.php">Les Equipes</a>
    <a href="../logout.php">Déconnexion</a>
  </nav>

  <main>
    <h2>Liste des Joueurs et Détails Financiers</h2>

    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Équipe</th>
          <th>Salaire (€)</th>
          <th>Budget Équipe (€)</th>
          <th>Modifier</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $newJoueur= new joueur($connection);
        $newJoueur->afficherDACHBORD();
        ?>
      </tbody>
    </table>
  </main>

  <footer>
    © 2025 - ApexMercato - Tous droits réservés
  </footer>

</body>

</html>
<?php



?>