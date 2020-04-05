<?php
session_start();
$chatUid=$_SESSION['mychat'];

include_once('config.php');
$con=mysqli_connect($db_host,$db_user,$db_pass);
if(isset($_POST['chat']))
{
	$result = mysqli_query($con, "INSERT INTO `travel_app`.`".$chatUid."`(`chat_id`,`chat_person_name`,`chat_value`, `chat_time`)VALUES(NULL,'$_SESSION[name]','$_POST[chat]',NOW());");
	
	}

?>