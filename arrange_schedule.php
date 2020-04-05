<?php
session_start();
require('config.php');

   
    $days=$_SESSION["groupDays"];
    $nowday=$_SESSION['whichday'];

    $uid=$_SESSION['uid'];
    $groupUid=$_SESSION['groupUid'];
    $chatUid=$_SESSION['chatUid'];

    $_SESSION['mygroup']=$groupUid;
    $_SESSION['mychat']=$chatUid; 

    $con=mysqli_connect($db_host,$db_user,$db_pass);
    if(mysqli_connect_errno($con)){
        echo "Unable to connect: ".mysqli_connect_error();
    }

    mysqli_query($con,'SET CHARACTER SET utf8');
    $db_select=mysqli_select_db($con,$db_name);
    $sql="UPDATE users SET mygroup=".$groupUid.",mychat=".$chatUid." WHERE uid=".$uid."";
    $result=mysqli_query($con,$sql) or die("無法新增".mysqli_error($con));

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/arrange_schedule.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">


    <script type="text/javascript" src="jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


</head>



<body>

    <div id="botDiv">
        <div id="Top">
            <div id="title">
                排行程
            </div>
        </div>

        <button type="button" id="prev"></button>
        <div id="day">
            <p id="dayT">1</p>
        </div>
        <button id="next"></button>
        <div class="clear:both;"></div>

        <div id="Os">
            <form action="change_schedule.php" method="post">

                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p1"></p>
                        <div class="line"><button class="wren" id="i1" type="submit" name="change" value="1"><img style="" src="img/icons8-support-48.png"></button></div>


                    </div>
                </div>

                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p2"></p>
                        <div class="line"><button class="wren"     id="i2" type="submit" name="change" value="2"><img style="" src="img/icons8-support-48.png"></button>
                        </div>
                    </div>
                </div>
                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p3"></p>
                        <div class="line"><button class="wren" id="i3" type="submit" name="change" value="3"><img style="" src="img/icons8-support-48.png"></button></div>
                    </div>
                </div>
                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p4"></p>
                        <div class="line"><button id="i4" class="wren" type="submit" name="change" value="4"><img style="" src="img/icons8-support-48.png"></button></div>
                    </div>
                </div>
                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p5"></p>
                        <div class="line"><button id="i5" class="wren" type="submit" name="change" value="5"><img style="" src="img/icons8-support-48.png"></button></div>
                    </div>
                </div>
                <div id="outers">
                    <div class="schedule">
                        <p class="text" id="p6"></p>
                        <div class="line"><button class="wren" id="i6" type="submit" name="change" value="6"><img style="" src="img/icons8-support-48.png"></button></div>
                    </div>
                </div>

                <div id="bigthan6"></div>
                
                <input class="whichd" name="whichd" type="text" value="" style="display:none;">
                
            </form>
        </div>


        <form action="schedule_setting.php" method="post">
            <div id="addS">
                <input class="whichd" name="whichd" type="text" value="" style="display:none;">
                <input id="addT" type="submit" value="✚ 添加行程 ">
            </div>
        </form>
<a href="chatroom.php">
        <div id="create">
            <p id="creT">確定創建</p>
        </div>
        </a>
    </div>





</body>

<script id="123">
    var p;
    var days = <?php echo json_encode($days); ?>;

    var tArray = new Array();
    for (var k = 0; k < days; k++) {
        tArray[k] = new Array();
        for (var j = 0; j < 5; j++) {
            tArray[k][j] = "";
        }
    }


    var nowday = <?php echo json_encode($nowday); ?>;
    $(document).ready(function() {
        
    
     
         
        $('#dayT').html(nowday);
        
        $('.whichd').val(nowday);

        $('#next').click(function() {
            if (nowday + 1 <= days) {
                nowday++;
                
                $('.whichd').val(nowday);
                $('#dayT').html(nowday);
            }

            for (var i = 1; i <= 6; i++) {
                p = "p" + i;
                document.getElementById(p).innerHTML = "";
            }

            document.getElementById("bigthan6").innerHTML = "";

        });

        $('#prev').click(function() {
            if (nowday - 1 != 0) {
                nowday--;
               
                $('.whichd').val(nowday);
                $('#dayT').html(nowday);
            }
            for (var i = 1; i <= 6; i++) {
                p = "p" + i;
                document.getElementById(p).innerHTML = "";
            }
            document.getElementById("bigthan6").innerHTML = "";
        });

    });


    function setText() {

        xhr = new XMLHttpRequest();
        xhr.open('POST', 'scheduleFetch.php', true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send('nowday=' + nowday);
        xhr.onreadystatechange = function() {
            //	alert(xhr.responseText);
            $('#123').append(xhr.responseText)
            
           
    }
        
//         for(var i=1;i<=6;i++)
//        {
//            var istring=i.toString();
//            var containerstring ="#i"+istring;
//            var container=$(containerstring);
//            
//            var containerstring ="#p"+istring;
//            var containerp=$(containerstring);
//            
//            container.val(containerp.text());
//        }
       
        }

   
    
    setInterval("setText()", 250);

    function test() {
        alert("xd");

    }

   
    

</script>

</html>
