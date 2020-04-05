<?php
        
    require('config.php');
    session_start();

    $groupUid=$_SESSION['groupUid'];
        
    $con=mysqli_connect($db_host,$db_user,$db_pass);
    $db_selected=mysqli_select_db($con,$db_name);
    
    if(isset($_GET['id'])){
        $sql="SELECT photo_type,photo_data FROM album WHERE id=".$_GET['id'];
        
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
        $row=mysqli_fetch_array($result);
        header("Content-type: ".$row["photo_type"]);
        echo $row["photo_data"];
    }
    mysqli_close($con);
    
    
        
    
?>