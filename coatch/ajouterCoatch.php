<?php
namespace OOP2\coatch ;
include_once "../autoloding.php";
use OOP2\lesclass\coatch;
use OOP2\Databese;
$connection = databese::ConnexionDataBase();





if ($_SERVER['REQUEST_METHOD']==='POST'){
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nationalite = $_POST['nationalite'];
    $equipe_idA = $_POST['equipe_idA'];
    $Salaire = $_POST['Salaire'];

    $newcoatch = new coatch($connection,$name,$nationalite,$email,$equipe_idA,$Salaire);
    $newcoatch->Ajouter();
    header("Location:affichagecoutch.php");
}






?>