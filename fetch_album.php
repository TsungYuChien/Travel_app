<?php
session_start();
include_once('config.php');
$mygroup=$_SESSION['mygroup'];

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$result= mysqli_query($con , "SELECT id FROM album WHERE groupUid=".$mygroup."");



while ($row = mysqli_fetch_assoc($result)){
	
    echo '<script>
    
    var htmla;
    
    htmla+="<img id=stickerHead src=fetch_photo.php?id='.$row['id'].'>";
    
    </script>';
    
	}
    
 echo '
 
 <script>
   
    document.getElementById("imgbox").innerHTML=htmla;
        
        htmla="";
   
   </script>
 ';
   
  
?>
