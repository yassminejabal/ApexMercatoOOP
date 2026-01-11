<?php
namespace OOP2\crud_equipe;
include "../autoloding.php";
use OOP2\lesclass\equipe;

use OOP2\Databese;
$connection = databese::ConnexionDataBase();

$id = $_GET['id'];
$newequipe = new equipe($connection,id:$id);
if ($newequipe->delete()) {
    echo "oui";
   
    header("Location:afficher_Equipe.php");
}
else{
    echo "non";
}
    
