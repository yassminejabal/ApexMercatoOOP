<?php
include_once "index.php";
include "../trait.php";
$newequip = new equipe($name,$manager_name,$badget, $connection);
$data = $newequip->afficher($tb_equipe,$connection);
var_dump($data);

    foreach($data as $row){
        echo $row['name'];
        echo $row['manager_name'];
        echo $row['badget'];
    }

?>