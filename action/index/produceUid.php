<?php

require('../../config.php');

session_start();
$id=$_SESSION["id"];
$uid=100000+$id;

$con=mysqli_connect($db_host,$db_user,$db_pass);

if(mysqli_connect_errno($con)){
    
    echo "Unable to connect: ".mysqli_connect_error();
    
}
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);
//$sql="INSERT INTO users(`uid`) VALUES('$uid') WHERE id=$id";
$sql="UPDATE users SET uid=".$uid."
WHERE id=".$id."";
$result=mysqli_query($con,$sql);


$_SESSION['uid']=$uid;

header('Location: ../../homepage.php');



?>