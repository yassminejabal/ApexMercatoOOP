<?php
namespace OOP2\coatch;
require "../autoloding.php";
use OOP2\lesclass\coatch;
use OOP2\Databese;
$connection= databese::ConnexionDataBase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css.css">
  <style>
  /* ===== Formulaire Coach ===== */
  .coach-form {
    width: 100%;
    max-width: 500px;
    margin: 40px auto;
    padding: 30px 25px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    animation: fadeInUp 1.5s ease-out;
    transition: 0.3s;
  }

  .coach-form:hover {
    box-shadow: 0 14px 35px rgba(0, 0, 0, 0.2);
  }

  /* ===== Titre ===== */
  .coach-form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #1e3c72;
    font-size: 26px;
  }

  /* ===== Labels ===== */
  .coach-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #1e3c72;
  }

  /* ===== Inputs & Select ===== */
  .coach-form input,
  .coach-form select {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 14px;
    transition: 0.3s;
    background-color: #fff;
  }

  .coach-form input:focus,
  .coach-form select:focus {
    border-color: #2a5298;
    outline: none;
    box-shadow: 0 0 8px rgba(42, 82, 152, 0.35);
  }

  /* ===== Bouton ===== */
  .coach-form button {
    width: 100%;
    padding: 14px;
    background: linear-gradient(90deg, #1e3c72, #2a5298);
    color: #fff;
    border: none;
    border-radius: 14px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
  }

  .coach-form button:hover {
    background: linear-gradient(90deg, #2a5298, #1e3c72);
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
  }

  /* ===== Animation ===== */
  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(25px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg,
        #1e3c72,
        #3e5171ff,
        #8e44ad,
        #adcedeff);
    background-size: 400% 400%;
    animation: gradientAnimation 12s ease infinite;
    font-family: 'Segoe UI', Arial, sans-serif;
  }

  /* ===== Animation du background ===== */
  @keyframes gradientAnimation {
    0% {
      background-position: 0% 50%;
    }

    25% {
      background-position: 50% 100%;
    }

    50% {
      background-position: 100% 50%;
    }

    75% {
      background-position: 50% 0%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  body::before {
    content: "";
    position: fixed;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle,
        rgba(255, 255, 255, 0.08),
        transparent 60%);
    animation: rotateBg 30s linear infinite;
    z-index: -1;
  }

  @keyframes rotateBg {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }
</style>
</head>


<?php
$newcoatch = new coatch($connection);
$resultE = $newcoatch->getnaneEquipe();
?>

<body>
  <form class="coach-form" method="POST" action="ajouterCoatch.php">
    <h2>Ajouter un Coach</h2>

    <label for="name">Nom du Coach</label>
    <input type="text" name="name" id="name" placeholder="Nom complet" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="email@exemple.com" required>

    <label for="nationalite">Nationalité</label>
    <input type="text" name="nationalite" id="nationalite" placeholder="Nationalité" required>

    <label for="equipe_idA">Équipe</label>
    <select name="equipe_idA" id="equipe_idA" required>
      <option value="">-- Choisir une équipe --</option>
      <?php foreach ($resultE as $equipe) { ?>
        <option value=" <?= $equipe['id'] ?>"><?= $equipe['name'] ?></option>
      <?php } ?>

    </select>
    <label for="Salaire">Salaire :</label>
    <input type="number" id="nationalite" name="Salaire" placeholder="Salaire" required>

    <button type="submit">Enregistrer Coach</button>
  </form>

</body>

</html>