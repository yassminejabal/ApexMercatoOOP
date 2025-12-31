<?php
// include "index.php";
// class chechselect{
//     public function chech($select){
//         if($select = 'journaliste'){

//         }
//          if($select = 'admin') {

            
//         }
//     }
//   }  

if($_SERVER['REQUEST_METHOD']='POST'){
    if($_POST["role"]=='journaliste'){
        header("Location:journalist_view.php");
    }
    if($_POST["role"]=='admin'){
        header("Location:admin_dashboard.php");
    }
}








?>