<?php
namespace OOP2\crud_equipe;
include "../autoloding.php";
use OOP2\lesclass\equipe;
use OOP2\Databese;
$connection = databese::ConnexionDataBase();



if (isset($_GET['id'])) {
    session_start();
    $id = $_GET['id'];
    $_SESSION['id']=$_GET['id'];
} else {
    header("Location:afficher_Equipe.php");
}


$newequipe = new equipe($connection,null,null,null,$id);
$data = $newequipe->GetDatadeUpdate();

?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

        /* initial background */
        background: linear-gradient(270deg, #ff416c, #ff4b2b, #1fa2ff, #12d8fa, #38ef7d);
        background-size: 1000% 1000%;
        /* for smooth animation */
        animation: gradientShift 15s ease infinite;
        color: white;
    }

    /* keyframes for smooth neon-like gradient */
    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* form styling on top of animated background */
    form {
        width: 400px;
        padding: 30px;
        border-radius: 16px;
        background-color: rgba(0, 0, 0, 0.6);
        /* semi-transparent */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    form label {
        display: block;
        margin-top: 15px;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="number"] {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: none;
        margin-bottom: 10px;
        outline: none;
        font-size: 14px;
    }

    form button {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        background-color: #1fa2ff;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }

    form button:hover {
        background-color: #12d8fa;
        transform: scale(1.03);
    }
</style>
<form action="UPDATE.php" method="POST">

    <h2>Modifier l'Équipe</h2>

    <label for="name">Nom de l'équipe :</label>
    <input type="text" id="name" name="name"
        value="<?= $data['name']; ?>"
        required>

    <label for="manager_name">Nom du manager :</label>
    <input type="text" id="manager_name" name="manager_name"
        value="<?= $data['manager_name']; ?>"
        required>

    <label for="badget">Budget (€) :</label>
    <input type="number" id="badget" name="badget"
        min="0"
        value="<?= $data['badget']; ?>"
        required>

    <button type="submit" name="submit">Modifier l'équipe</button>
</form>
<?php


