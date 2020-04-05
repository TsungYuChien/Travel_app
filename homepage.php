<?php

    header("Content-Type:text/html; charset=utf-8");
    //關閉系統提示
    error_reporting(0);
    session_start();
    require('config.php');

    $name=$_SESSION['name'];
    $uid=$_SESSION["uid"];
    //$bechanged=$_SESSION["bechanged"];

    if(isset($_SESSION["name"])==FALSE){
        header('Location: index.php');
    }

   $con=mysqli_connect($db_host,$db_user,$db_pass);
    if(mysqli_connect_errno($con)){
        echo "Unable to connect: ".mysqli_connect_error();
    }



    mysqli_query($con,'SET CHARACTER SET utf8');
    $db_selected=mysqli_select_db($con,$db_name);
    $sql="SELECT mygroup FROM users WHERE uid=".$uid."";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    $mygroup=$row['mygroup'];
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">


    <script type="text/javascript" src="jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


</head>

<body>

    <div id="botDiv">
        <div id="Top">
            <div id="outerSearch">
                <img id="placeholderimg" src="img/icon-14.png">
                
                    <input id="Search" name="searchuid" type="text" placeholder="ID搜尋旅程">
                    <!--<button type="submit" id="searchButton">搜尋</button>-->
                    <button id="searchButton">搜尋</button>
               
            </div>
        </div>


        <div id="outerSticker">
           <img id="setting" src="img/icon2-10.png";>
            <div id="sticker">
               <form action="action/homepage/change_avatar.php" method="post" enctype="multipart/form-data">
                 
                  <div class="image-upload">
                     <label for="file-input">
                     <img id="stickerHead" src="fetch_avatar.php?userid=<?php echo $name; ?>">
                      </label>
                      
                      <input id="file-input" type="file" onchange="this.form.submit()" name="avatar">
                  </div>
                </form> 
                
                
            </div>
        </div>
       <div id="name"><?php echo $name ?></div>

       
       <?php 
        
        if($row['mygroup']==NULL){
        
        echo '<div id="outerAdd">
            <a href="travel_setting.php"><button id="addNew" type="submit">✚ 創建新旅程</button></a>
        </div>';
    }
    else
    {
        $sql="SELECT groupName FROM groupManager WHERE groupUid='".$mygroup."'";
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
        $row=mysqli_fetch_array($result);
        $groupname=$row['groupName'];
        
        echo ' <div id="outerAdd">
            <a href="chatroom.php"><button id="addNew" type="submit">'.$groupname.'</button></a>
        </div>';
    }
    
        
        ?>
       
        
        
    </div>

    <div id="outerTop">
        <div id="topDiv">
           <div id="close">
               <img id="closeImg" src="img/nicon5-13.png">
           </div>
            
            <img id="groupImg" src="img/view.jpg">
            <div id="textContent">
               <div id="txtt">
                <p>
                    峇里島三八團<br><br> 旅遊日期&nbsp;&nbsp;:&nbsp;&nbsp;7/1-7/10
                    <br><br> 旅遊編號&nbsp;&nbsp;:&nbsp;&nbsp;87874877
                </p>
                <br>
               </div>
              
                
          
                 
                 <div id="member">旅遊成員<br></div>
                 
                 <div id="outermemberH">
                 <div id="setW">
                 <img id="memberHead" src="img/dog.jpg" >
                                  <img id="memberHead" src="img/dog.jpg" >

                                 <img id="memberHead" src="img/dog.jpg" >

                                 <img id="memberHead" src="img/dog.jpg" >

                                 <img id="memberHead" src="img/dog.jpg" >

                                 <img id="memberHead" src="img/dog.jpg" >
                                 

                 </div>
                </div>
                                 
                 

            </div>
            
            <div class="joindiv">
              <a href="chatroom.php">
                <button class="join">
                    <p id="buttontext">加入</p>
                    <div id="imgset"><img class="joinimg" src="img/icons8-enter-96.png"></div>
                    
                </button>
               </a>
                                
            </div>
            
        </div>
    </div>

    <div id="cover"></div>



</body>

<script id="123">
    
    var groupid;
    
    
    
    $(document).ready(function() {
        $('#cover').hide();
        $('#topDiv').hide();

        $('#searchButton').click(function() {
            $('#cover').show();
            $('#cover').animate({
                opacity: 0.5
            }, 500);
            
            $('#topDiv').show();
            $('#topDiv').animate({
                opacity: 1,
                'margin-top': '-35.5vh'
            }, 500);
            
            groupid=$("#Search").val();
           setText();
            setText2();
            
        });
        
        $('#close').click(function(){
            
            $('#cover').animate({
                opacity: 0
            },500).hide("500");
            
            
            $('#topDiv').animate({
                opacity: 0,
                'margin-top': '-29.5vh'
            },500).hide("500");
          
             
        });

    });
    
     function setText() {
        xhr = new XMLHttpRequest();
        xhr.open('POST', 'action/homepage/search_group.php', true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send('searchuid=' + groupid);
        xhr.onreadystatechange = function() {
            //	alert(xhr.responseText);
            $('#123').append(xhr.responseText)
            
            
    }
     }
    
    function setText2() {
        xhr2 = new XMLHttpRequest();
        xhr2.open('POST', 'fetch_head.php', true);
        xhr2.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr2.send();
        xhr2.onreadystatechange = function() {
            //	alert(xhr.responseText);
            $('#123').append(xhr2.responseText)
            
           
    }
     }
</script>

</html>