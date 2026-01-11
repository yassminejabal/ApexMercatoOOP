<?php

namespace OOP2\transforme;

include_once "../autoloding.php";
session_start();

use OOP2\Databese;
use PDO;
// use OOP2\lesclass\equipe;
// use OOP2\lesclass\transfert;
use OOP2\lesclass\equipe;
use OOP2\lesclass\joueur;
use OOP2\FinancialEngine;
use OOP2\lesclass\transfert;

$connection = databese::ConnexionDataBase();




if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <!-- <pre><?php var_dump($_POST); ?></pre> -->
<?php
    $equipe_idB = $_POST['teamB_id'];
    
    $Joueur_id = $_SESSION['Joueur_id'];
    $montant_transfert = $_POST['price'];
    //katjib id and equipe dyal Joueur;
    $equipeIDandjoueur = equipe::getequipe_idADEjoueur($connection, $Joueur_id);
    $result = $equipeIDandjoueur;
    $Joueur_id = $_SESSION['Joueur_id'];
    $equipe_idA = $result[0]['equipe_idA'];
    //katjib katjib bedjet dyal equipe dyale joueur;
    $badget_equipeA = equipe::getbedgetequipe($connection, $Joueur_id);
    $badget_equipeA = $badget_equipeA['badget'];
    //katjib badget equipe_idB;
    $badget_equipeB = equipe::getbedjetequipeB($connection,$equipe_idB);
    $badget_equipeB = $badget_equipeB['badget'];
    joueur::updatejoueurTransfer($connection, $equipe_idA, $Joueur_id);


    transfert::transaction($connection,(float) $equipe_idA,$equipe_idB,(float) $Joueur_id,(float) $badget_equipeA,(float) $badget_equipeB, (float)$montant_transfert);
        header("Loction:confirme.php");

    }
    










?>






