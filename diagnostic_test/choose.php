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
            <a class="homelink" href="/test/home.php">勉強分析診断</a>
        </div>

        <div class="header-list">
            <ul>
                <li class="login" onclick="toLogin();" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'"><?php
                                                                                                                                                                    // ログイン中であれば「マイページ」を表示、それ以外の場合は「ログイン」を表示
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

    <div class="main-c">


        <div class="tests-title">受けたい診断を選んでください</div>

        <div class="tests-contents2">
            <span class="Etests-choose">あなたが英語が苦手な理由は？</span>
            <a href="/test/englishQ1.php" class="Etest-btn">診断を始める</a>
        </div>



        <div class="tests-contents1">
            <span class="Mtests-choose">あなたが数学が苦手な理由は？</span>
            <a href="/test/mathQ1.php" class="Mtest-btn">診断を始める</a>
        </div>

    </div>

</body>

</html>