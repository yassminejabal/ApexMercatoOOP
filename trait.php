<?php
include "databese.php";

class Crud{
    public function afficher($tableau,$connection){
        $sql = "SELECT * FROM $tableau";
        $prepare = $connection->prepare($sql);
        $arrayreturn = $connection->execute($prepare);
        return $arrayreturn->fetch_all(MYSQLI_ASSOC);
    }
}






?>