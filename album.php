<?php

    header("Content-Type:text/html; charset=utf-8");
    //關閉系統提示
    error_reporting(0);
    session_start();
    require('config.php');

    $uid=$_SESSION['uid'];

    $groupUid=$_SESSION['groupUid'];
    
    //$bechanged=$_SESSION["bechanged"];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/album.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">


    <script type="text/javascript" src="/jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


</head>

<body>

    <div id="botDiv">
        <div id="Top">
           <a href="chatroom.php"><img class="back" src="img/icon-13.png"></a>
            <div id="title">
                相簿
            </div>
        </div>


        <div id="imgbox">

        </div>



        <form action="action/album/upload_photo.php" method="post" enctype="multipart/form-data" id="myForm">
            <div class="image-upload">
                <label for="file-input">


                    <div id="plus">＋</div>
                </label>
                <input id="file-input" type="file" onchange="this.form.submit()" name="photo">
            </div>
        </form>



    </div>





</body>

<script id="123">
    $(document).ready(function() {

        setText2();
    });

    function setText2() {
        xhr2 = new XMLHttpRequest();
        xhr2.open('POST', 'fetch_album.php', true);
        xhr2.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr2.send();
        xhr2.onreadystatechange = function() {
            //	alert(xhr.responseText);
            $('#123').append(xhr2.responseText)


        }
    }

</script>

</html>
