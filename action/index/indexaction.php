<?php
require('../../config.php');
session_start();

$name=$_POST['myname'];
$error_flag=FALSE;

$con=mysqli_connect($db_host,$db_user,$db_pass);
if(mysqli_connect_errno($con)){
    echo "Unable to connect: ".mysqli_connect_error();
}

mysqli_query($con,'SET CHARACTER SET utf8');
$db_select=mysqli_select_db($con,$db_name);
$sql="INSERT INTO `users`(`name`) VALUES('$name');";
$result=mysqli_query($con,$sql) or die("無法新增".mysqli_error($con));


$result= mysqli_query($con , "SELECT * FROM users");
while($row=mysqli_fetch_assoc($result)){
    if(empty($_POST['myname'])==FALSE){
        $_SESSION["id"]=$row["id"];
        $_SESSION["name"]=$_POST['myname'];
        header('Location: produceUid.php');

    }
}


?>