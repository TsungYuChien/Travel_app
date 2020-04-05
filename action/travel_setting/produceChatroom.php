<?php

require('../../config.php');

session_start();

$chatUid=$_SESSION["chatUid"];

$con=mysqli_connect($db_host,$db_user,$db_pass);

if(mysqli_connect_errno($con)){
    
    echo "Unable to connect: ".mysqli_connect_error();
    
}
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);
$sql="CREATE TABLE `travel_app`.`".$chatUid."` ( `chat_id` INT(11) NOT NULL AUTO_INCREMENT , `chat_person_name` VARCHAR(100) NOT NULL , `chat_value` VARCHAR(100) NOT NULL , `chat_time` TIME NULL DEFAULT NULL , PRIMARY KEY (`chat_id`)) ENGINE = InnoDB;";


$result=mysqli_query($con,$sql);

header('Location: ../../arrange_schedule.php');



?>