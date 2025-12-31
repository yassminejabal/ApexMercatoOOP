<?php
include "databese.php";

trait Crd{
    public function afficher($tableau,$connection){
        $sql = "SELECT * FROM $tableau";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>