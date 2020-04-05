<?php
session_start();
include_once('config.php');

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$result= mysqli_query($con , "SELECT * FROM users");



while ($row = mysqli_fetch_assoc($result)){
	
    echo '<script>
    
    var htmla;
    
    htmla+="<img id=memberHead src=fetch_avatar.php?userid='.$row['uid'].'>";
    
    </script>';
    
	}
    
 echo '
 
 <script>
   
    document.getElementById("setW").innerHTML=htmla;
        
        htmla="";
   
   </script>
 ';
   
  
?>
