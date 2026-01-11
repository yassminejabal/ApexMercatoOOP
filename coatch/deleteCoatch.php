<?php
namespace OOP2\coatch;
use OOP2\coatch\coatch;
$id = $_GET['id'];
$newcaoutch = new coatch($connection,$id);
$newcaoutch->delete();