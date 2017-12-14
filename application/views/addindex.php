<?php
session_start();
$_SESSION['addindex']=$_GET['id'];
header("location:index.php");
?>