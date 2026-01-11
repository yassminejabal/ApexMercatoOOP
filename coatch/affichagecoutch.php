<?php

namespace OOP2\coatch;

include_once "../autoloding.php";

use OOP2\lesclass\coatch;
use OOP2\Databese;

$connection = databese::ConnexionDataBase();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Joueurs</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #0f172a;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            flex-direction: row;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 400px;
            padding: 20px;
            border-radius: 16px;
            color: white;
            text-align: center;
            animation: bg 6s infinite alternate;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.06);
        }

        @keyframes bg {
            0% {
                background: linear-gradient(135deg, #ff416c, #ff4b2b);
            }

            50% {
                background: linear-gradient(135deg, #1d2671, #c33764);
            }

            100% {
                background: linear-gradient(135deg, #11998e, #38ef7d);
            }
        }

        .label {
            opacity: 0.8;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h1>Liste des coatch</h1>

</body>

</html>

<?php
$newcoatch = new coatch($connection);
$res = $newcoatch->afficher();

foreach ($res as $row) { ?>

    <div class="container">
        <div class="card">
            <h2><?= $row['name'] ?></h2>
            <button> <a href="deleteCoatch.php?id=<?= $row['id'] ?>">delete</a></button>
            <p><span class="label">Email:</span><?= $row['email'] ?></p>
            <p><span class="label">equipe_idA:</span><?= $row['nationalite'] ?></p>
            <p><span class="label">Nationalité:</span><?= $row['equipe_idA'] ?></p>
            <p><span class="label">transfirer Coatch :</span></p>
            <button><a href="../transformecoatch/transformeCOATCHHTML.php?id=<?= $row['id'] ?>">transfirer Coatch : </a></button>

        </div>
    </div>

<?php } ?>