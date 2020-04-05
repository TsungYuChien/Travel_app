<?php
session_start();
include_once('config.php');

$groupUid=$_SESSION["groupUid"];
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$whichday=$_POST['nowday'];
$result= mysqli_query($con , "SELECT * FROM `".$groupUid."` WHERE days=$whichday");

$textC=1;


while ($row = mysqli_fetch_assoc($result)){
	
if($textC<=6)
{
  echo '<script>
   document.getElementById("p'.$textC.'").innerHTML="*'.$row['schedule_name'].'";
  
  </script>';
}
    
    else
        
    {
        echo '<script>
        
        var htmlT;
        
        htmlT+="<div id=outers><div class=schedule><p class=text id=p6>*'.$row['schedule_name'].'</p><div class=line><button class=wren id=i6 type=submit name=change value=6><img src=img/icons8-support-48.png></button></div></div></div>";
        
        
       
        
  </script>';
    }
    
     $textC++;
	}
    
   echo '
   
   <script>
   
    document.getElementById("bigthan6").innerHTML=htmlT;
        
        htmlT="";
   
   </script>
   
   '
  
?>
