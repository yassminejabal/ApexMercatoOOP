<?php
namespace OOP2\transformecoatch;
include "../autoloding.php";
use OOP2\Databese;
$connection = databese::ConnexionDataBase();

use OOP2\lesclass\equipe;
use OOP2\lesclass\joueur;
use OOP2\FinancialEngine;
use OOP2\lesclass\coatch;
use OOP2\lesclass\conrat;
use OOP2\lesclass\transfert;
session_start();


if ($_SERVER['REQUEST_METHOD']==='POST') {
     $montant_transfert = $_POST['salaire'];
     $id_coatch = $_SESSION['id'];


    $namecoatch = $_SESSION['namecoatch'];
     $namecoatch;
     $equipe_idA_coatch = $_SESSION['equipe_idA'];

     $equipe_idB_coatch = $_POST['teamB_id'];
    echo "<br>";
    echo "<br>";

    $badget_equipeA = coatch::getbedgetequipecoatch($connection,$id_coatch);
    coatch::getbedgetwhereequipe($connection,$badget_equipeA);
    $badget_equipeB = equipe::getbedjetequipeB($connection,$equipe_idB_coatch);
    $badget_equipeB = $badget_equipeB['badget'];

        coatch::updatecoatchTransfer($connection, $equipe_idA_coatch, $id_coatch);
        
    $r = transfert::transactioncoatch($connection, (int) $equipe_idA_coatch, (int) $equipe_idB_coatch, (int) $id_coatch, (int) $badget_equipeA, (int) $badget_equipeB, (int) $montant_transfert);
    var_dump($r);

            header("Location:confirme.php");
    

}
















?>