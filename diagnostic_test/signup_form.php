<?php
session_start();

require_once 'functions.php';
require_once 'UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
  header('Location: mypage.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
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
        <li class="login" onclick="toLogin();" style="cursor: pointer;">ログイン</li>
        <li class="search"><a href="choose.php">診断を選ぶ</a></li>
      </ul>
    </div>
  </div>

  <div class="main-c">
    <h2 style="padding:0px 30px">会員登録フォーム</h2>
    <?php if (isset($login_err)) : ?>
      <p><?php echo $login_err; ?></p>
    <?php endif; ?>
    <form action="register.php" method="POST">
      <p>
        <label for="username">ユーザ名：</label>
        <input type="text" name="username">
      </p>
      <p>
        <label for="email">メールアドレス：</label>
        <input type="email" name="email">
      </p>
      <p>
        <label for="password">パスワード：</label>
        <input type="password" name="password">
      </p>
      <p>
        <label for="password_conf">パスワード確認：</label>
        <input type="password" name="password_conf">
      </p>
      <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
      <p>
        <input type="submit" value="新規登録">
      </p>
    </form>
    <a href="login_form.php" style="cursor: pointer;" onMouseOver="this.style.color='#C0C0C0'" onmouseout="this.style.color='#000000'">ログインする</a>
  </div>
</body>

</html>