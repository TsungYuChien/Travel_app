<?php

require('../../config.php');

session_start();

$groupUid=$_SESSION["groupUid"];

$con=mysqli_connect($db_host,$db_user,$db_pass);

if(mysqli_connect_errno($con)){
    
    echo "Unable to connect: ".mysqli_connect_error();
    
}
mysqli_query($con,'SET CHARACTER SET utf8');
$db_selected=mysqli_select_db($con,$db_name);
$sql="CREATE TABLE `travel_app`.`".$groupUid."`( `id` INT(32) NOT NULL AUTO_INCREMENT , `schedule_name` VARCHAR(255) NOT NULL , `multiple_choice` VARCHAR(255) NOT NULL , `book_time` TIME(6) NOT NULL , `location` VARCHAR(255) NOT NULL , `note` VARCHAR(255) NOT NULL , `select_schedule` VARCHAR(255) NOT NULL , `days` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";


$result=mysqli_query($con,$sql);

header('Location: produceChatroom.php');



?>