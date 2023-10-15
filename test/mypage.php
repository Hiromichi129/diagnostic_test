<?php

session_start();
require_once 'UserLogic.php';
require_once 'functions.php';
require_once '../dbconnect.php';

// ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザーを登録してログインしてください';
    header('Location: signup_form.php');
    return;
}

$login_user = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="english.js"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <title>ユーザー登録完了画面</title>
</head>

<body>

    <div class="header">


        <div class="header-logo">
            <a class="homelink" href="/test/home.php">勉強分析診断</a>
        </div>

        <div class="header-list">
            <ul class="lists">
                <li class="login" onclick="toMypage();" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'">マイページ</li>
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
            </ul>
        </div>
    </div>

    <div class="main-c">

        <h2 styel="padding:0px 30px">マイページ</h2>

        <p>ログインユーザー：<?php echo h($login_user['name']) ?></p>
        <p>メールアドレス：<?php echo h($login_user['email']) ?></p>


        <h2>My診断結果</h2>
       
        <form action="logout.php" method="POST">
            <input type="submit" name="logout" value="ログアウト">
        </form>


    </div>


</body>

</html>