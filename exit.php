<?php 
require('config.php');
session_start();

$_SESSION['mygroup']=NULL;
$_SESSION['mychat']=NULL;

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$sql="UPDATE users SET mygroup=NULL,mychat=NULL WHERE uid=".$_SESSION['uid']."";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

header("Location: homepage.php");


?>