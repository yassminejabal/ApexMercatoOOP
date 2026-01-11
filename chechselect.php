<?php
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST["role"]=='journaliste'){
        $_SESSION['role'] = 'journaliste';
        header("Loction");
        // header("Location:html/journalist_view.php");
    }
    if($_POST["role"]=='admin'){
        // header("Location:html/admin_dashboard.php");
        $_SESSION['role'] = 'admin';
    }
        if($_POST["role"]=='visiteur'){
        // header("Location:html/visiteur.php");
        $_SESSION['role'] = 'visiteur';
    }
}
?>