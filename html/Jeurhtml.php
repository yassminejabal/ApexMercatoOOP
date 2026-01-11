<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter un Joueur - Admin ApexMercato</title>
  <link rel="stylesheet" href="css.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      color: white;
      margin-bottom: 30px;
      font-size: 28px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    form {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      animation: slideUp 0.8s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: 600;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    select {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      border: 2px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus,
    select:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.3);
    }

    .error {
      border-color: #e74c3c !important;
      background-color: #fef5f5;
    }

    .error-message {
      color: #e74c3c;
      font-size: 12px;
      margin-top: -8px;
      margin-bottom: 10px;
      display: none;
    }

    .error-message.show {
      display: block;
    }

    .team-badges {
      margin: 20px 0;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .team-badge {
      padding: 8px 12px;
      border-radius: 20px;
      color: white;
      font-weight: 600;
      font-size: 12px;
    }

    button {
      width: 100%;
      padding: 14px;
      margin-top: 20px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(102, 126, 234, 0.4);
    }

    button:active {
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <div>
    <h2>Ajouter un Joueur - Admin</h2>

    <form action="crud_jeur/indexx.php" method="POST" id="playerForm">
      <label for="name">Nom du joueur :</label>
      <input type="text" id="name" name="name" placeholder="Ex: Messi" required>
      <span class="error-message" id="nameError">Le nom est requis</span>

      <label for="role">Rôle :</label>
      <select id="role" name="role" required>
        <option value="">*==Sélectionner le rôle==*</option>
        <option value="Attaquant">Attaquant</option>
        <option value="Défenseur">Défenseur</option>
        <option value="Milieu">Milieu</option>
        <option value="Gardien">Gardien</option>
      </select>
      <span class="error-message" id="roleError">Veuillez sélectionner un rôle</span>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" placeholder="Ex: messi@fcapex.com" required>
      <span class="error-message" id="emailError">Email invalide</span>

      <label for="nationalite">Nationalité :</label>
      <input type="text" id="nationalite" name="nationalite" placeholder="Ex: Argentin" required>
      <span class="error-message" id="nationaliteError">La nationalité est requise</span>

      <label for="equipe_idA">ID de l'équipe :</label>
      <input type="number" id="equipe_idA" name="equipe_idA" placeholder="Ex: 1" required>
      <span class="error-message" id="equipeError">Veuillez sélectionner une équipe valide</span>

      <div class="team-badges">
        <span class="team-badge" style="background:#1e90ff;">1 → FC Apex</span>
        <span class="team-badge" style="background:#2ecc71;">2 → FC Mercato</span>
        <span class="team-badge" style="background:#f39c12;">3 → FC Champions</span>
      </div>

      <label for="valeur_marcher">Valeur marchande (€) :</label>
      <input type="number" id="valeur_marcher" name="valeur_marcher" min="0" placeholder="Ex: 50000000" required>
      <span class="error-message" id="valeurError">La valeur marchande doit être positive</span>

      <label for="Salaire">Salaire :</label>
      <input type="number" id="Salaire" name="Salaire" placeholder="Salaire" required>
      <span class="error-message" id="salaireError">Le salaire est requis</span>

      <button name="submit" type="submit">Ajouter le joueur</button>
    </form>
  </div>

  

</body>

</html>