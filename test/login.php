<?php

session_start();

require_once 'UserLogic.php';

// バリデーション
$err = [];

if (!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを記入してください。';
}
if (!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを記入してください。';
};


if (count($err) > 0) {
    // セッションへエラー内容を連想配列で保存
    $_SESSION =  $err;
    // エラーがあった場合はlogin_form.phpに戻す    
    header('Location: login_form.php');
    return;
}
// ログイン成功時の処理
$result = UserLogic::login($email, $password);
// ログイン失敗時の処理
if (!$result) {
    header('Location: login_form.php');
    return;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン完了</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="english.js"></script>
</head>

<body>
    <?php if (count($err) > 0) : ?>
        <div class="header">
            <div class="header-logo">
                <a class="homelink" href="/test/home.php">勉強分析診断</a>
            </div>

            <div class="header-list">
                <ul class="lists">
                    <li class="login">ログイン</li>
                    <li class="search"><a href="choose.php">診断を選ぶ</a></li>
                </ul>
            </div>
        </div>
        <div class="main-c">

            <?php foreach ($err as $e) : ?>
                <p><?php echo $e ?></p>
            <?php endforeach ?>
            <a href="./signup_form.php">戻る</a>
        </div>

    <?php else : ?>
        <div class="header">

            <div class="header-logo">
                <a class="homelink" href="/test/top.php">勉強分析診断</a>
            </div>

            <div class="header-list">
                <ul class="lists">
                    <li class="login">ログイン</li>
                </ul>
            </div>
        </div>

        <div class="main-c">

            <h2 styel="padding:0px 30px">ログイン完了</h2>

            <p>ログインしました</p>

            <a href="mypage.php">マイページへ</a>

        </div>

    <?php endif ?>

</body>

</html>