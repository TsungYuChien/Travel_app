<?php

    session_start();
    require('../../config.php');

    $groupUid=$_SESSION["mygroup"];

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    $db_selected=mysqli_select_db($con,$db_name);

    if(count($_FILES)>0){
        if(is_uploaded_file($_FILES['photo']['tmp_name'])){
            
            $photoData=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            $photoProperties=getimageSize($_FILES['photo']['tmp_name']);
            $sql="INSERT INTO album(photo_type ,photo_data ,groupUid) VALUES('{$photoProperties['mime']}', '{$photoData}','$groupUid')";
            
            $result=mysqli_query($con,$sql) or die(mysqli_error($con));
            
            if(isset($result)){
                header("Location: ../../album.php");
            }
            
        }
    }








?>