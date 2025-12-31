<?php 
include "../databese.php";
if($connection){
    echo "oui il y'a conn";
}
else{
    echo "aucue connection";
}
if($_SERVER['REQUEST_METHOD']='POST'){
    echo $name = $_POST['name'];
    echo $role = $_POST['role'];
    echo $email = $_POST['email'];
    echo $nationalite = $_POST['nationalite'];
    echo $equipe_idA = $_POST['equipe_idA'];
    echo $valeur_marcher = $_POST['valeur_marcher'];
    $sql = "INSERT INTO joueur(name,role,email,nationalite,equipe_idA,valeur_marcher) VALUES(:name,:role,:email,:nationalite,:equipe_idA,:valeur_marcher)";
    $prepare = $connection->prepare($sql);
    $prepare->execute([
        ':name'=>$name,
       ':role'=>$role,
       ':email'=>$email,
        ':nationalite'=>$nationalite,
        ':equipe_idA'=>$equipe_idA,
        ':$valeur_marcher'=>$valeur_marcher
    ]);
    
}



// id	name	role	email	nationalite	equipe_idA	valeur_marcher	


?>

<!-- Nom du joueur :
Ex: Messi
Rôle :

*==Sélectionner le rôle==*
Email :
Ex: messi@fcapex.com
Nationalité :
Ex: Argentin
ID de l’équipe : -->
