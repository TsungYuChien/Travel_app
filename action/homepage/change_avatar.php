<?php

    session_start();
    require('../../config.php');

    $uid=$_SESSION["uid"];

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    $db_selected=mysqli_select_db($con,$db_name);

    if(count($_FILES)>0){
        if(is_uploaded_file($_FILES['avatar']['tmp_name'])){
            
            $avatarData=addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
            $avatarProperties=getimageSize($_FILES['avatar']['tmp_name']);
            $sql="UPDATE users SET avatar_type='{$avatarProperties['mime']}',avatar_data='$avatarData' WHERE uid=$uid";
            
            $result=mysqli_query($con,$sql) or die(mysqli_error($con));
            
            if(isset($result)){
                header("Location: ../../homepage.php");
            }
            
        }
    }








?>