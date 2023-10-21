<?php
session_start();

require_once 'UserLogic.php';

$result = UserLogic::checkLogin();
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
            <a class="homelink" href="home.php">勉強分析診断</a>
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
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-e">
        <div class="Question">
            Q3.英文の文型を見分けることができる

        </div>
        <div class="btns">
            <input type="button" class="btn_yes" value="はい" onclick="location.href='resultE4.php'">
            <input type="button" class="btn_no" value="いいえ" onclick="location.href='resultE3.php'">
        </div>
    </div>
</body>

</html>