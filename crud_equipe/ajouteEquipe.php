<?php
namespace OOP2\crud_equipe;
require '../autoloding.php';
use OOP2\Databese;
use OOP2\lesclass\equipe;
$connection= databese::ConnexionDataBase();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $manager_name = $_POST['manager_name'];
    $badget = $_POST['badget'];
    $newequipe = new equipe($connection,$name,$manager_name,$badget);
    $newequipe->Ajouter();

    header("Location:afficher_Equipe.php");
}

?>