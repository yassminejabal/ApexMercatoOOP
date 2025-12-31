<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
    <link rel="stylesheet" href="css.css">

</head>
<body>
    

  <header>Login</header>

  <div class="login-box">
    <h3>Choisir votre rôle</h3>

    <form method="POST" action="chechselect.php">
      <select id="role" name="role">
        <option value="">🔽 Sélectionner</option>
        <option name='admin' value="admin">👑 Admin</option>
        <option name='journaliste' value="journaliste">📰 Journaliste</option>
      </select>

      <button type="submit" class="btn-login">Se connecter</button>
    </form>

    <!-- Bouton Visiteur -->

    <a class="btn-visitor" href="visiteur.php">👤 Continuer en tant que visiteur</a>
  </div>

  <footer>
    © 2025 - Tous droits réservés
  </footer>

</body>
</html>
