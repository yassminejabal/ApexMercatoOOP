<?php
namespace OOP2\crud_equipe;
include "../autoloding.php";
use OOP2\lesclass\equipe;
use OOP2\Databese;
$connection = databese::ConnexionDataBase();

if($_SERVER['REQUEST_METHOD']==='POST'){
    session_start();
    $id=$_SESSION['id'];
    // echo $id;
    $name =  $_POST['name'];
    $manager_name =  $_POST['manager_name'];
    $badget= $_POST['badget'];
    $id;

    $newequipe = new equipe($connection,$name,$manager_name,$badget,$id);
    $ret = $newequipe->modifier();
    if(isset($ret)){
    header("Location: afficher_Equipe.php");
    }
}