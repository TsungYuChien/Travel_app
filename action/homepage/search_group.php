<?php

    session_start();
    require('../../config.php');

    $searchuid=$_POST["searchuid"];

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    if(mysqli_connect_errno($con)){
        echo "Unable to connect: ".mysqli_connect_error();
    }



    mysqli_query($con,'SET CHARACTER SET utf8');
    $db_selected=mysqli_select_db($con,$db_name);
    $sql="SELECT * FROM groupManager WHERE groupUid='".$searchuid."'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    
    while($row=mysqli_fetch_array($result)){
        $_SESSION["tmp_groupUid"]=$row["groupUid"];
        $_SESSION["tmp_chatUid"]=$row["chatUid"];
        $_SESSION["tmp_groupName"]=$row["groupName"];
        $_SESSION["tmp_groupDate"]=$row["groupDate"];
        $_SESSION["tmp_groupDays"]=$row["groupDays"];
        $_SESSION["tmp_groupAlarm"]=$row["groupAlarm"];
        
       echo 
       '
       <script>
       
       document.getElementById("txtt").innerHTML="<p>'.$_SESSION["tmp_groupName"].'<br><br> 旅遊日期&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION["tmp_groupDate"].'<br><br> 旅遊編號&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION["tmp_groupUid"].'</p><br>";
       
       </script>
       ';
    }









?>