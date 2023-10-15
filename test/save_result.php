<?php 
session_start();
require_once 'UserLogic.php';
require_once 'functions.php';
require_once '../dbconnect.php';
$result = UserLogic::checkLogin();

$login_user = $_SESSION['login_user'];



?>


<!DOCTYPE html>
<html>

<head>
    <title>勉強分析診断</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="english.js"></script>
    <meta charset="UTF-8">
</head>

<body>
    <div class="header">
        <div class="header-logo">
            <a class="homelink" href="/test/home.php">勉強分析診断</a>
        </div>
        <div class="header-list">
            <ul>
                <li class="login" onclick="toLogin();" style="cursor: pointer;">
                <?php

                    if ($result) {
                       echo 'マイページ';
                    } else {
                       echo 'ログイン';
                    }
                ?>
                </li>
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
             
            </ul>
        </div>
    </div>

    <div class="main-c">
  
 <?php 

require_once 'UserLogic.php';
require_once 'functions.php';
require_once '../dbconnect.php';
$result = UserLogic::checkLogin();

$login_user = $_SESSION['login_user'];
$email = $login_user['email'];
$result1 = $_POST['result'];

 $result = UserLogic::getresult($result1,$email); 
if (!$result) {
   echo '失敗です';
    return;
}?>

    
    </div>
</body>

</html>