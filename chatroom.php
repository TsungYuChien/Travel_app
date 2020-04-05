<?php

    header("Content-Type:text/html; charset=utf-8");
    //關閉系統提示
    error_reporting(0);
    session_start();
    require('config.php');

    $uid=$_SESSION['uid'];

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    if(mysqli_connect_errno($con)){
        echo "Unable to connect: ".mysqli_connect_error();
    }

    mysqli_query($con,'SET CHARACTER SET utf8');
    $db_select=mysqli_select_db($con,$db_name);
    $sql="SELECT mygroup FROM users WHERE uid=".$uid."";
    $result=mysqli_query($con,$sql) or die("無法新增".mysqli_error($con));

    $row=mysqli_fetch_assoc($result);
    if($row['mygroup']==NULL){
        $_SESSION['mygroup']=$_SESSION['tmp_groupUid'];
        $_SESSION['mychat']=$_SESSION['tmp_chatUid'];
        $groupUid=$_SESSION['mygroup'];
        $chatUid=$_SESSION['mychat'];
        
        
        $sql="UPDATE users SET mygroup=".$groupUid.",mychat=".$chatUid." WHERE uid=".$uid."";
        $result=mysqli_query($con,$sql) or die("無法新增".mysqli_error($con));
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/chatroom.css">
    <script type="text/javascript" src="jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


</head>

<script>
   
      var bottom=0;
    
function getText() {
    
   
		
	var $a =	document.getElementById('messageInput').value;
	
		xhr = new XMLHttpRequest();
		xhr.open('POST' , 'chatdb.php',true);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send('chat='+$a);
		xhr.onreadystatechange=function(){
			if (xhr.responseText){
			//	document.getElementById('chatarea').innerHTML=xhr.responseText;
									}
				}
        
					}
		

function setText(){
	
  
    
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatFetch.php' , true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send();
	xhr.onreadystatechange = function(){
	//	alert(xhr.responseText);
			document.getElementById('chatbox').innerHTML = xhr.responseText;
        
        
			}
		  if(bottom<=1){
        $('#chatbox').scrollTop(100000);
       bottom++;
    }
  
	}
	setInterval("setText()",600);
	
	


	
		
		
</script>

<body>
    
    <?php
    
    $groupName=$_SESSION["groupName"];
    
    ?>

    <div id="chatroomTop">
        <a href="homepage.php"><img class="back" src="img/icon-13.png"></a>
        <div id="travelName"><?php echo $groupName ?>
            <button type="submit" id="dotManu">
       <div id="circle1"><div class="innerCircle"></div></div>
       <div id="circle2"><div class="innerCircle"></div></div>
       <div id="circle3"><div class="innerCircle"></div></div>
      </button>




        </div>




    </div>
    
    

    <div style="clear:both"></div>


   
   
    <div id="Manu">

        <div id="threeTitle">

            <div id="Ocount">
                <div id="countH">旅遊人數</div>
                <div id="textCount">1</div>
            </div>
            <div id="Odate">

                <div id="date">出發日期</div>
                <div id="textDate">2019-08-30</div>
            </div>
            <div id="Ocode">
                <div id="code">旅遊編號</div>
                <div id="textCode">200006</div>
            </div>
            <div style="clear:both"></div>



        </div>

        <div id="line"></div>
        
        <!----------------- close notification ----------------->
        <a href="">
            <div class="block1"><img id="note" src="img/icon2-15.png">
                <div class="line2"></div>
            </div>
        </a>

        <!----------------- return location ----------------->
        <a href="">
            <div class="block1"><img id="locate" src="img/icon-16.png">
                <div class="line2"></div>
            </div>
        </a>
        
        <!----------------- open gallery ----------------->
        <a href="album.php">
            <div class="block1"><img id="gallery" src="img/icon-15.png">
                <div class="line2"></div>
            </div>
        </a>
        
        <!----------------- exit ----------------->
        <a href="exit.php">
            <div class="block2"><img id="exit" src="img/icon-11.png">
            </div>
        </a>
        
        <div style="<clear:both></clear:both>"></div>
        
        <a href="arrange_schedule.php">
        <div id="gotoarr">旅遊行程</div>
</a>
    </div>
    
             <div id="chatbox" style="padding-top:px;"></div>

    <div id="message">
        <img id="JPG" src="img/icon2-13.png">
        <img id="MIC" src="img/icon2-14.png">
        <div id="outerInput">
            <input type="text" id="messageInput">
            <input type="image" id="sentOut" src="img/icon2-12.png"onclick="getText()">
        </div>
        <div style="clear:both"></div>

    </div>

</body>

<script>
    var myv;
//     
//   function scrollWindow(){
//       var t = document.getElementById('chatbox');
//       t.scrollTop = t.scrollHeight;
//       myv=setTimeout('scrollWindow()',0);
//        
//   }
//	
//    scrollWindow();
//  
//    
//    function myStopFunction() {
//  
//}
    
    var manucount = false;

    $(document).ready(function() {
        
        
        $('#sentOut').click(function(){
           $('#messageInput').val(""); 
        });

        $('#dotManu').click(function() {
            
            $('#Manu').show();

            if (manucount == false) {
                $('#Manu').animate({
                    'margin-top': '72px'
                }, 250);



            } else if (manucount == true) {

                $('#Manu').animate({
                    'margin-top': '-700px'
                }, 250);



            }

            if (manucount == false) manucount = true;
            else manucount = false;
        });

    });
</script>

</html>
