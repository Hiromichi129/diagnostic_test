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
                </li>
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
            </ul>
        </div>
    </div>
    <div class="main-c">
        <form action="save_result.php" method="POST">
            <div class="result">診断結果</div>
            <p class="resultContet">公式と定義の知識が足りていません</p>
            <input type="hidden" name="result" value="公式と定義の知識が足りていません">
            <button type="submit">結果を保存する</button>
        </form>
    </div>
</body>

</html>