<?php
namespace OOP2\transformecoatch;
session_start();
include "../autoloding.php";
use OOP2\lesclass\transfert;
use OOP2\Databese;
use OOP2\lesclass\equipe;

$connection=databese::ConnexionDataBase();
$id = $_GET['id'];
$_SESSION['id'] = $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* ===== Animated Background BODY ===== */
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(135deg,
                    #1e3c72,
                    #2a5298,
                    #8e44ad,
                    #16a085,
                    #f39c12);

            background-size: 400% 400%;
            animation: gradientAnimation 14s ease infinite;

            font-family: 'Segoe UI', Arial, sans-serif;
            overflow: hidden;
        }

        /* ===== Animation ديال تبديل الألوان ===== */
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

        /* ===== Light overlay effect ===== */
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

        /* ===== Rotate animation ===== */
        @keyframes rotateBg {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* ===== Coach Card ===== */
        .coach-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 360px;
            padding: 18px 25px;
            border-radius: 14px;
            background: linear-gradient(135deg, #8e44ad, #5e3370);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
            transition: transform .35s ease, box-shadow .35s ease;
            margin-bottom: 25px;
        }

        /* hover animation */
        .coach-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.5);
        }

        /* NAME (left) */
        .coach-name {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: 1px;
        }

        /* EQUIPE (right) */
        .coach-equipe {
            font-size: 14px;
            font-weight: 500;
            color: #8e44ad;
            background: #ffffff;
            padding: 6px 14px;
            border-radius: 20px;
            transition: transform .3s ease, background .3s ease;
        }

        /* hover equipe */
        .coach-card:hover .coach-equipe {
            background: #f0e6f6;
            transform: scale(1.1);
        }

        /* ===== Formulaire de transfert coach ===== */
        .transfer-form {
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

        .transfer-form:hover {
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.2);
        }

        /* ===== Titre ===== */
        .transfer-form h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #5e3370;
            font-size: 26px;
        }

        /* ===== Labels ===== */
        .transfer-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #5e3370;
        }

        /* ===== Inputs & Select ===== */
        .transfer-form input,
        .transfer-form select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
            background-color: #fff;
        }

        .transfer-form input:focus,
        .transfer-form select:focus {
            border-color: #8e44ad;
            outline: none;
            box-shadow: 0 0 8px rgba(142, 68, 173, 0.35);
        }

        /* ===== Bouton ===== */
        .transfer-form button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #5e3370, #8e44ad);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .transfer-form button:hover {
            background: linear-gradient(90deg, #8e44ad, #5e3370);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body>
    <form method="POST" action="DataTransformeCoach.php" class="transfer-form">
        <?php
        $result = transfert::getidnamedeselectequipe($connection);
        $equipecoatchANDname = transfert::getnameequipeIDCOATCH($connection,$id);
        $namecoatch = $equipecoatchANDname['name'];
        $_SESSION['namecoatch'] = $namecoatch;
        $equipe_idA = $equipecoatchANDname['equipe_idA'];
        $_SESSION['equipe_idA'] = $equipe_idA;

        
        ?>
        <h2>Transfert de coach</h2>

        <div class="coach-card">
            <div class="glow"></div>
            <span class="coach-name" name = "name">Nom : <?= $equipecoatchANDname['name'] ?></span>
            <span class="coach-equipe"name = "equipe_idA">Équipe actuelle : <?= $equipecoatchANDname['equipe_idA'] ?></span>
        </div>

        <!-- الفريق الجديد -->
        <label>Nouvelle équipe</label>
        <select name="teamB_id" required>
            <option value="">-- Équipe destination --</option>
            <?php 
            foreach($result as $equipe){ ?>
            <option value="<?= $equipe['id'] ?>"><?= $equipe['name']  ?></option>
            <?php } ?>
        </select>

        <!-- الراتب -->
        <label>Salaire (€)</label>
        <input type="number" name="salaire" required>

        <!-- تاريخ نهاية العقد -->
        <!-- <label>Date fin du contrat</label>
        <input type="datetime-local" name="datefin" required> -->

        <button type="submit" name="submit">Valider le transfert</button>
    </form>
</body>

</html>