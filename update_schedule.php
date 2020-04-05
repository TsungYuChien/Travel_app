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
$changeN=$_SESSION['changeN'];
$a="1";

echo $changeN;

$con=mysqli_connect($db_host,$db_user,$db_pass);
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);

$sql="UPDATE `".$groupUid."` SET schedule_name='".$schedule_name."',multiple_choice='".$multiple_choice."',book_time='".$book_time."',location='".$location."',note='".$note."',select_schedule='".$select."' WHERE id=".$changeN."";

$result = mysqli_query($con,$sql)or die("無法新增".mysqli_error($con));
	
header('Location: arrange_schedule.php');

?>

