<?php
session_start();
require('config.php');

$groupUid=$_SESSION["groupUid"];
$select=$_POST["select"];
$schedule_name=$_POST["schedule_name"];
$multiple_choice=$_POST["multiple_choice"];
$book_time=$_POST["book_time"];
$location=$_POST["location"];
$note=$_POST["note"];
$day=$_SESSION['whichday'];

$con=mysqli_connect($db_host,$db_user,$db_pass);
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);

$sql="INSERT INTO `".$groupUid."`(`schedule_name`,`multiple_choice`,`book_time`,`location`,`note`,`select_schedule`,`days`)VALUES ('$schedule_name','$multiple_choice',NOW(),'$location','$note','$select','$day')";

$result = mysqli_query($con,$sql)or die("無法新增".mysqli_error($con));
	
header('Location: arrange_schedule.php');

?>
