<?php
namespace OOP2\html;
session_start();
require_once "../autoloding.php";
use OOP2\lesclass\transfert;
use OOP2\Databese;
use OOP2\lesclass\equipe;
use OOP2\lesclass\joueur;

$connection = databese::ConnexionDataBase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background: #0a1f44;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .joueur-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 360px;
        padding: 18px 25px;
        border-radius: 14px;
        background: linear-gradient(135deg, #0d6efd, #003f88);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
        transition: transform .35s ease, box-shadow .35s ease;
    }

    /* hover animation */
    .joueur-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.5);
    }

    /* NAME (left) */
    .joueur-name {
        font-size: 20px;
        font-weight: 600;
        color: #ffffff;
        letter-spacing: 1px;
    }

    /* EQUIPE (right) */
    .joueur-equipe {
        font-size: 14px;
        font-weight: 500;
        color: #0d6efd;
        background: #ffffff;
        padding: 6px 14px;
        border-radius: 20px;
        transition: transform .3s ease, background .3s ease;
    }

    /* hover equipe */
    .joueur-card:hover .joueur-equipe {
        background: #dbe9ff;
        transform: scale(1.1);
    }





    /* ===== Formulaire de transfert ===== */
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
        color: #1e3c72;
        font-size: 26px;
    }

    /* ===== Labels ===== */
    .transfer-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #1e3c72;
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
        border-color: #2a5298;
        outline: none;
        box-shadow: 0 0 8px rgba(42, 82, 152, 0.35);
    }

    /* ===== Bouton ===== */
    .transfer-form button {
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

    .transfer-form button:hover {
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

    /* ===== Responsive ===== */
    @media (max-width: 600px) {
        .transfer-form {
            padding: 25px 20px;
        }

        .transfer-form h2 {
            font-size: 22px;
        }
    }

    /* ===== Background animé ===== */
    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg,
                #1e3c72,
                #2a5298,
                #8e44ad,
                #448aadff);
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

    .transfer-form {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(6px);
    }

    /* رسالة error فقط */
    .form-error {
        background-color: #ff4d4d;
        /* أحمر واضح */
        color: #fff;
        /* نص أبيض باش يقرا مزيان */
        padding: 12px 15px;
        margin-bottom: 20px;
        border-left: 6px solid #d8000c;
        border-radius: 8px;
        font-weight: bold;
        text-align: center;
        animation: fadeInUp 0.8s ease-out, blinkRed 1s ease infinite alternate;
    }

    /* animation fadeInUp */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* blink animation بسيط يعطي تأثير حيوية */
    @keyframes blinkRed {
        0% {
            background-color: #ff4d4d;
        }

        100% {
            background-color: #ff1a1a;
        }
    }
</style>
</head>

<?php

?>
<?php

$resultE2 = transfert::getidnamedeselectequipe($connection);

?>

<?php
$id = $_GET['id'];

$_SESSION['Joueur_id'] = $id;



?>

<body>
    <form method="POST" action="DataTransformeJoueur.php" class="transfer-form">
        <h2>Transfert de joueur</h2>
        <?php
        $nameAndequipe = joueur::getnameANDequipejoueur($id,$connection);
        ?>

        <label>Joueur</label>
        <?php 
        // session_start();
        // $_SESSION['Joueur_id']=
        ?> 

        <?php foreach ($nameAndequipe as $elment) { ?>
            <div class="joueur-card">
                <div class="glow"></div>
                <span class="joueur-name" name="name">Name:<?= $elment['name'] ?></span>
                <span class="joueur-equipe" name="equipe_idA">EQuipe:<?= $elment['equipe_idA'] ?></span>
            </div>
            <?php } ?>

        <label>Nouvelle équipe</label>

        <select name="teamB_id" required>
            <option value="">-- Équipe destination --</option>
            <?php foreach ($resultE2 as $equipe) { ?>
                <option value=" <?= $equipe['id'] ?>"><?= $equipe['name'] ?></option>
            <?php } ?>
        </select>

        <label>Montant du transfert (€)</label>
        <input type="number" name="price" required>
        <button type="submit" name="submit">Valider le transfert</button>
    </form>

</body>

</html>