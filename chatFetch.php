<?php
session_start();
$name =$_SESSION["name"];
$chatUid=$_SESSION["mychat"];

include_once('config.php');
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

  

$result= mysqli_query($con , "SELECT * FROM `".$chatUid."`");
while ($row = mysqli_fetch_assoc($result)){
    
	  $img="fetch_avatar.php?userid=".$row['chat_person_name']."";
      
    
    $length=strlen($row['chat_value']);
    
    if($length<=15)
    {
        $wL= 40+$length*10;
        $height = 30;
    }
    else
    {
        if($length<=30)
        {
        $wL= 50+$length*10;
        $height =40 ;
        }
        
        else
        {
        $wL= 325;
        $height =40 ;
        }
        
    }
    
	if($row['chat_person_name']==$name)
	echo '<div style="padding-top:50px;margin-right:15px;float:right">
          <div style="width:100%;">
        
          <div style="float:right;height:'.$height.'px;">
          
          <div style="width:50px;height:50px; border-radius:999em;background-image: url('.$img.');background-size:50px 50px;"><div></div></div>
          <div style="font-size:15px;text-align:center;width:50px;font-family:genjyuH;margin-top:7px;color:#823F0D;">'.$row['chat_person_name'].'</div>
          </div>  
          <div id="123" style=color:white;float:right;font-size:20px;margin-right:5px;margin-top:0vh;height:50px;"><div style="text-align:center;width:'.$wL.'px;background-color:#823F0D;border-radius:5px;word-break:break-all;height:'.$height.'px;display:flex;
    align-items:center;
    justify-content:center;font-family:genjyu; ">
          '.$row['chat_value'].'
          </div></div>
       
           </div>
        <div style="clear:both;"></div>

          </div>  <div style="clear:both;"></div>
    ';
    
    else
        echo '<div style="padding-top:50px;margin-left:15px;float:left">
          <div style="width:100%;">
          
          <div style="float:left;height:'.$height.'px;">
          
          <div style="width:50px;height:50px;background-image: url('.$img.');background-size:50px 50px; border-radius:999em;"></div>
          <div style="font-size:15px;text-align:center;width:50px;font-family:genjyuH;margin-top:7px;color:#823F0D;">'.$row['chat_person_name'].'</div>
          </div>  
          <div id="123" style=color:white;float:left;font-size:20px;margin-left:5px;margin-top:0vh;height:50px;"><div style="text-align:center;width:'.$wL.'px;background-color:#823F0D;border-radius:5px;word-break:break-all;height:'.$height.'px;display:flex;
    align-items:center;
    justify-content:center;font-family:genjyu; ">
          '.$row['chat_value'].'
          </div></div>
       
           </div>
        <div style="clear:both;"></div>

          </div>  <div style="clear:both;"></div>
    ';
    
   
	}
    
   
?>
