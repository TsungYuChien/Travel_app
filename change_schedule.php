<?php

require('config.php');
session_start();
   
    $whichDay=$_POST["whichd"];
    $_SESSION['whichday']=$whichDay;
    $_SESSION['changeN']=$_POST["change"];
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/schedule_setting.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">


        <script type="text/javascript" src="/jQuery/jquery-3.4.1.min.js"></script>

        <script type="text/javascript" src="/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

        <script type="text/javascript" src="/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
</head>
<body>
    <div id="Top">
                <div id="title">
                    行程設置
                </div>
            </div>
            
            <div id="Bblock">
                <form action="update_schedule.php" method="post">
                <div id="innerT">
                <p>選擇行程：<input type="text" name="select"></p>
                <br>
                <br><br>
                <p>行程名稱：<input type="text" name="schedule_name"></p>
                <br><br>
                <br>
                <p>多重選項：<input type="text" name="multiple_choice"></p>
                <br><br>
                <br>
                <p>預定時間：<input type="text" name="book_time"></p>
                <br><br>
                <br>
                <p>行程定位：<input type="text" name="location"></p>
                <br><br>
                <br>
                <p>備註：<input type="text" name="note"></p>
                </div>
                
               <input id="addT" type="submit" value="✚ 修改">
                </form>
            </div>
            
</body>
</html>