<?php
// include "../interface/INTERFACE.PHP";
include_once "../databese.php";
// include "../equipe.php";
include_once "../Class/coatch.php";
// include "../Class/equipee.php";
if ($_SERVER['REQUEST_METHOD']==='POST'){
    session_start();
    $name = $_POST['name'];
    // $_SESSION['name'] = $name;
    $email = $_POST['email'];
    // $_SESSION['email'] = $email;

    $nationalite = $_POST['nationalite'];
    // $_SESSION['nationalite'] = $nationalite;

    $equipe_idA = $_POST['equipe_idA'];
    // $_SESSION['equipe_idA'] = $equipe_idA;

        $Salaire = $_POST['Salaire'];
    // $_SESSION['Salaire'] = $Salaire;

    $newcoatch = new coatch($connection,$id = null,$name,$nationalite,$email,$equipe_idA,$Salaire);
$newcoatch->Ajouter();
header("Location:affichagecoutch.php");
}






?>