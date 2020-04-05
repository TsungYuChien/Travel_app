<?php
        
    require('config.php');
    session_start();

    $uid=$_SESSION['uid'];

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    $db_selected=mysqli_select_db($con,$db_name);
    
    if(isset($_GET['userid'])){
        $sql="SELECT avatar_type,avatar_data FROM users WHERE name='".$_GET['userid']."'";
        
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
        $row=mysqli_fetch_array($result);
        header("Content-type: ".$row["avatar_type"]);
        echo $row["avatar_data"];
    }


    mysqli_close($con);
    
    
        
    
?>