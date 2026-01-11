<?php
namespace OOP2\crud_jeur;
 include "../autoloding.php";
use OOP2\lesclass\joueur;
use OOP2\Databese;
$connection= databese::ConnexionDataBase();
// echo $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $newjoueur = new joueur($connection,$id);
    $newjoueur->delete();
    header("Location:afficherjoueur.php");
}













?>