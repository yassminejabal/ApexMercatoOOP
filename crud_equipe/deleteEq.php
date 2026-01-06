<?php
include "../interface/INTERFACE.PHP";
// include_once "../databese.php";
// include "../Crud/equipe.php";
include "../Class/equipee.php";
$id = $_GET['id'];
echo $id;
$newequipe = new equipe($connection,id:$id);
if ($newequipe->delete()) {
    echo "oui";
   
    header("Location:afficher_Equipe.php");
}
else{
    echo "non";
}
    
