<?php
session_start();

require_once 'UserLogic.php';

// userlogicクラスのcheckLoginメソッド
$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$err = $_SESSION;

// セッションファイルにarray()が入る
$_SESSION = array();

// セッションを消す
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="english.js"></script>
    <title>ログイン画面</title>
</head>

<body>
    <div class="header">

        <div class="header-logo">
            <a class="homelink" href="/test/home.php">勉強分析診断</a>
        </div>

        <div class="header-list">
            <ul class="lists">
                <li class="login" onclick="toLogin();" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'">ログイン</li>
                <li class="search"><a href="choose.php">診断を選ぶ</a></li>
            </ul>
        </div>
    </div>

    <div class="main-c">
        <div class="loginTitle">ログイン</div>
        <?php if (isset($err['msg'])) : ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <p>
                <label for="email">メールアドレス：</label>
                <input type="email" name="email">
                <?php if (isset($err['email'])) : ?>
            <p><?php echo $err['email']; ?></p>
        <?php endif; ?>
        </p>
        <p>
            <label for="password">パスワード：</label>
            <input type="password" name="password">
            <?php if (isset($err['password'])) : ?>
        <p><?php echo $err['password']; ?></p>
    <?php endif; ?>
    </p>

    <input type="submit" value="ログイン">
        </form>
        <br><a href="signup_form.php" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'">新規登録はこちら</a></br>
    </div>
</body>

</html>