<?php
session_start();
if(Empty($_GET['id']))$_GET['id']='hehe';
$_SESSION['addcapnhat']=$_GET['id'];
header("location:capnhat_sach.php");
?>