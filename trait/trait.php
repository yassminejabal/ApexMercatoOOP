<?php
include_once "databese.php";

trait Crd{
    public function afficher($tableau,$connection){
        $sql = "SELECT * FROM $tableau";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
public function delete($conn,$id,$name){
              $stmt =$conn->prepare("DELETE FROM $name WHERE id= :id");
             return $stmt->execute([':id' => $id]);
    }

}

?>
