<?php
include_once "../Class/joueur.php";

if ($connection) {
    echo "oui il y'a conn";
} else {
    echo "aucue connection";
}
if (isset($_POST['submit'])) {
    echo $name = $_POST['name'];
    echo $role = $_POST['role'];
    $email = $_POST['email'];
    $nationalite = $_POST['nationalite'];
    $equipe_idA = $_POST['equipe_idA'];
    $valeur_marcher = $_POST['valeur_marcher'];
    $Salaire = $_POST['Salaire'];

    $newjoueur = new joueur($connection, null, $name, $email, $role, $nationalite, (int) $equipe_idA, $valeur_marcher, $Salaire);
    $newjoueur->Ajouter();
    
}
header("Location:afficherjoueur.php");
