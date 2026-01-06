<?php
include "../Class/joueur.php";


?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tableau des Joueurs avec Animation</title>
<style>
  /* Animation du fond du body (changement de couleurs en douceur) */
  @keyframes fondColor {
    0%   { background-color: #1e3c72; }
    25%  { background-color: #2a5298; }
    50%  { background-color: #1e3c72; }
    75%  { background-color: #27496d; }
    100% { background-color: #1e3c72; }
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #fff;
    margin: 0;
    padding: 40px;
    animation: fondColor 15s ease-in-out infinite;
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    text-shadow: 0 0 8px rgba(0,0,0,0.6);
  }

  /* Style du tableau */
  table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    overflow: hidden;
  }

  thead tr {
    background: rgba(0,0,0,0.3);
  }

  thead th {
    padding: 15px;
    font-size: 1.1em;
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  tbody tr {
    transition: background-color 0.3s ease;
    cursor: default;
  }

  tbody tr:nth-child(even) {
    background-color: rgba(255,255,255,0.1);
  }

  tbody tr:hover {
    background-color: rgba(255,255,255,0.25);
    transform: scale(1.03);
    box-shadow: 0 4px 15px rgba(255,255,255,0.3);
  }

  tbody td {
    padding: 12px 15px;
    text-align: center;
  }

</style>
</head>
<?php
$newcoatch = new joueur($connection);
$data = $newcoatch->afficher();
?>
<body>

<h1>Liste des Joueurs</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>role</th>
      <th>email</th>
      <th>Nationalité</th>
      <th>Équipe</th>
      <th>Salaire</th>
      <th>valeur_marcher</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $raw){ ?>
    <tr>
      <!-- <td><?=$raw['name']  ?></td> -->
        
      <td><?=$raw['name']  ?></td>
      <td><?=$raw['role']  ?></td>
      <td><?=$raw['email']  ?></td>
      <td><?=$raw['nationalite']  ?></td>
      <td><?=$raw['equipe_idA']  ?></td>
      <td><?=$raw['Salaire']  ?></td>
      <td><?=$raw['valeur_marcher']  ?></td>

    </tr>
    <?php } ?>

  </tbody>
</table>

</body>
</html>
