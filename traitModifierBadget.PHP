<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    
}
trait newbadget{
    public function modoferbadget($id,$newbadget,$connection){
        $sql = "UPDATE equipe SET badget=$newbadget WHERE id = $id";
        $connection->query($sql);
    }
}
?>