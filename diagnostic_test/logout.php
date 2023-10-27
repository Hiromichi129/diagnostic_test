<?php
session_start();
require_once 'UserLogic.php';
if (!$logout = filter_input(INPUT_POST, 'logout')) {
    exit('不正なリクエストです');
}
$result = UserLogic::checkLogin();
if (!$result) {
    exit('セッションが切れたので、ログインし直してください');
}
Userlogic::logout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <title>ログアウト</title>
</head>

<body>
    <div class="header">
        <div class="header-logo">
            <a class="homelink" href="home.php">勉強分析診断</a>
        </div>
        <div class="header-list">
            <ul class="lists">
                <li class="login" onclick="toMypage();" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'">マイページ</li>
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
            </ul>
        </div>
    </div>
    <div class="main-c">
        <h2 styel="padding:0px 30px">ログアウト完了</h2>
        <p>ログアウトしました</p>
        <a href="login_form.php">ログイン画面へ</a>
    </div>
</body>

</html>