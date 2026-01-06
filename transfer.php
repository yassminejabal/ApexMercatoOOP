<?php
include_once "databese.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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
<?php
$sql = "SELECT id,name FROM joueur";
$resultJ = $connection->query($sql);
$ssql = "SELECT id,name FROM equipe";
$resultE = $connection->query($ssql);
$ss = "SELECT id,name FROM equipe";
$resultE2 = $connection->query($ss);
$error = '';
?>


<body>
    <form method="POST" action="" class="transfer-form">
        <h2>Transfert de joueur</h2>


        <?php
        if (isset($_POST['submit'])) {
            if ($_POST['teamB_id'] === $_POST['teamA_id']) {

                $error = " L'équipe actuelle et la nouvelle équipe ne peuvent pas être identiques."; ?>


            <?php } ?>
            <?php $Joueur_id = $_POST['Joueur_id'];
            $teamA_id = $_POST['teamA_id'];
            $teamB_id = $_POST['teamB_id'];
            $sqll = "INSERT INTO transfert(equipe_idA,equipe_idB,Joueur_id,coatch_id) VALUES(:equipe_idA,:equipe_idB,:Joueur_id,:coatch_id)";



            ?>
        <?php } ?>


        <label>Joueur</label>
        <select name="Joueur_id" required>
            <option value="">-- Sélectionner --</option>
            <?php foreach ($resultJ as $joueur) { ?>
                <option value="<?= $joueur['id'] ?>"><?= $joueur['name'] ?></option>
            <?php } ?>
        </select>
        <?php if ($error) ?>

        <div class="form-error"><?php echo $error ?></div>

        <?php ?>

        <label>Nouvelle équipe</label>


        <select name="teamA_id" required>
            <option value="">-- Équipe destination --</option>
            <?php foreach ($resultE2 as $equipe) { ?>
                <option value=" <?= $equipe['id'] ?>"><?= $equipe['name'] ?></option>
            <?php } ?>
        </select>



        <label>Équipe actuelle</label>

        <select name="teamB_id" required>
            <option value="">-- Équipe source --</option>
            <?php foreach ($resultE as $equipea) { ?>
                <option value=" <?= $equipea['id'] ?>"><?= $equipea['name'] ?></option>
            <?php } ?>
        </select>


        <label>Montant du transfert (€)</label>
        <input type="number" name="price" required>

        <button type="submit" name="submit">Valider le transfert</button>
    </form>

</body>

</html>