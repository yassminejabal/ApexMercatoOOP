<?php
include_once "../Class/coatch.php";
// include_once "../databese.php";
$id = $_GET['id'];
$newcaoutch = new coatch($connection,$id);
$newcaoutch->delete();