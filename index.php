<?php 

session_start();
$uid=$_SESSION['uid'];
if($uid!=NULL)header('Location: homepage.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    
    
</head>
<body>
   
   <img id=title src="img/logo-14.png">
   
   <form action="action/index/indexaction.php" method="post" id="myform">
       <div id="input">
       
           <input id="inputName" name="myname" type="text" placeholder="旅遊者暱稱">
       
       </div>
   
       <div id="outerSubName">
           <input id="subName" type="submit" value="開始旅程">
       </div>
       
     
   
   </form>
   
     <img src="img/earth-14.png" id="earth">
   
</body>
<script>
    
       
    </script>
</html>