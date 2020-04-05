<?php

require('../../config.php');
session_start();

$groupName=$_POST["groupName"];
$groupDate=$_POST["groupDate"];
$groupDays=$_POST["groupDays"];
$groupAlarm=$_POST["groupAlarm"];


$con=mysqli_connect($db_host,$db_user,$db_pass);
if(mysqli_connect_errno($con)){
    echo "Unable to connect: ".mysqli_connect_error();
}

mysqli_query($con,'SET CHARACTER SET utf8');
$db_select=mysqli_select_db($con,$db_name);
$sql="INSERT INTO groupManager(groupName,groupDate,groupDays,groupAlarm) VALUES('$groupName','$groupDate','$groupDays','$groupAlarm');";
$result=mysqli_query($con,$sql) or die("無法新增".mysqli_error($con));

$result=mysqli_query($con,"SELECT * FROM groupManager");
while($row=mysqli_fetch_assoc($result)){
    $_SESSION["groupid"]=$row["id"];
    $_SESSION["groupName"]=$row["groupName"];
    $_SESSION["groupDate"]=$row["groupDate"];
    $_SESSION["groupDays"]=$row["groupDays"];
    $_SESSION["groupAlarm"]=$row["groupAlarm"];
    
    
}
header('Location: produceGroupUid.php');


?>