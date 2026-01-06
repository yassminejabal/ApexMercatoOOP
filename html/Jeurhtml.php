
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter un Joueur - Admin ApexMercato</title>
  <link rel="stylesheet" href="css.css">

  <style>

  </style>
</head>

<body>

  <h2>Ajouter un Joueur - Admin</h2>

  <form action="crud_jeur/indexx.php" method="POST">
    <label for="name">Nom du joueur :</label>
    <input type="text" id="name" name="name" placeholder="Ex: Messi" required>

    <label for="role">Rôle :</label>
    <select id="role" name="role" required>
      <option value="">*==Sélectionner le rôle==*</option>
      <option value="Attaquant">Attaquant</option>
      <option value="Défenseur">Défenseur</option>
      <option value="Milieu">Milieu</option>
      <option value="Gardien">Gardien</option>
    </select>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="Ex: messi@fcapex.com" required>

    <label for="nationalite">Nationalité :</label>
    <input type="text" id="nationalite" name="nationalite" placeholder="Ex: Argentin" required>

    <label for="equipe_idA">ID de l’équipe :</label>
    <input type="number" id="equipe_idA" name="equipe_idA" placeholder="Ex: 1" required>

    <div class="team-badges">
      <span class="team-badge" style="background:#1e90ff;">1 → FC Apex</span>
      <span class="team-badge" style="background:#2ecc71;">2 → FC Mercato</span>
      <span class="team-badge" style="background:#f39c12;">3 → FC Champions</span>
    </div>
    <label for="valeur_marcher">Valeur marchande (€) :</label>
    <input type="number" id="valeur_marcher" name="valeur_marcher" min="0" placeholder="Ex: 50000000" required>
    <label for="Salaire">Salaire :</label>
    <input type="number" id="equipe_idA" name="Salaire" placeholder="Salaire" required>

    <button name="submit" type="submit">Ajouter le joueur</button>
  </form>

</body>

</html>