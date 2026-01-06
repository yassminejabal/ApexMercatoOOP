<?php
include "../interface/INTERFACE.PHP";
// include_once "../databese.php";
include "../Crud/equipe.php";
include "../Class/equipee.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $manager_name = $_POST['manager_name'];
    $badget = $_POST['badget'];
    $newequipe = new equipe($connection,$name,$manager_name,$badget);
    $newequipe->Ajouter();

    header("Location:afficher_Equipe.php");
}

?>