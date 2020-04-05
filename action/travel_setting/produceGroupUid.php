<?php

require('../../config.php');

session_start();
$id=$_SESSION["groupid"];
$uid=200000+$id;
$chatUid=300000+$id;

$_SESSION['groupUid']=$uid;
$_SESSION['chatUid']=$chatUid;

$_SESSION['whichday']=1;

$con=mysqli_connect($db_host,$db_user,$db_pass);

if(mysqli_connect_errno($con)){
    
    echo "Unable to connect: ".mysqli_connect_error();
    
}
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);
//$sql="INSERT INTO users(`uid`) VALUES('$uid') WHERE id=$id";
$sql="UPDATE groupManager SET groupUid=".$uid.",chatUid=".$chatUid."
WHERE id=".$id."";
$result=mysqli_query($con,$sql);




header('Location: produceGroup.php');



?>