<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/travel_setting.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">


    <script type="text/javascript" src="/jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


</head>

<body>

    <div id="botDiv">
        <div id="Top">
          <a href="homepage.php"><img class="back" src="img/icon-13.png"></a>
           <div id="title">
               旅遊設置
           </div>
        </div>
        <form action="change_grouppic.php" method="post" enctype="multipart/form-data">
                 
                  <div class="image-upload">
                    
                     <div class="group_pic">
                      <label for="file-input">
            <img src="img/view.jpg">
             </label>
        </div>
                     
                      
                     
                  </div>
            </form> 
        
        
        <div class="group_info">
            
            <form action="action/travel_setting/travel_setting_action.php" method="post">
                
                <div class="group_name">
                    <span>名稱</span>
                    <input type="text" name="groupName">
                </div>
                
                <div class="group_date">
                    <span>旅遊日期</span>
                    <input type="date" name="groupDate">
                </div>
                
                <div class="group_days">
                    <span>旅遊天數</span>
                    <input type="text" name="groupDays">
                </div>
                
                <div class="group_alarmclock">
                    <span>早晨提醒</span>
                    <input type="time" name="groupAlarm">
                </div>
                
                <div class="nextPage"><input id="inputN"type="submit" value="下一頁"></div>
                
            </form>
            
        </div>

    </div>

    

    

</body>

<script>
    $(document).ready(function() {

        
    });
</script>

</html>