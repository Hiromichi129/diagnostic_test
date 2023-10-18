<?php
session_start();
require_once 'UserLogic.php';
$result = UserLogic::checkLogin();
// エラーメッセージ
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
//トークンがない、もしくは一致しない場合、処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit('不正なリクエスト');
}

unset($_SESSION['csrf_token']);

if (!$username = filter_input(INPUT_POST, 'username')) {
  $err[] = 'ユーザ名を記入してください。';
}
if (!$email = filter_input(INPUT_POST, 'email')) {
  $err[] = 'メールアドレスを記入してください。';
}
$password = filter_input(INPUT_POST, 'password');
// 正規表現
if (!preg_match("/\A[a-z\d]{8,100}+\z/i", $password)) {
  $err[] = 'パスワードは英数字8文字以上100文字以下にしてください。';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
  $err[] = '確認用パスワードと異なっています。';
}

if (count($err) === 0) {
  // ユーザを登録する処理
  $hasCreated = UserLogic::createUser($_POST);

  if (!$hasCreated) {
    $err[] = '登録に失敗しました';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheet.css">
  <script type="text/javascript" src="english.js"></script>
  <title>ユーザー登録完了画面</title>
</head>

<body>

  <div class="header">
    <div class="header-logo">
      <a class="homelink" href="/test/home.php">勉強分析診断</a>
    </div>

    <div class="header-list">
      <ul class="lists">
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
  <div class="main-c">
    <?php if (count($err) > 0) : ?>
      <?php foreach ($err as $e) : ?>
        <p><?php echo $e ?></p>
      <?php endforeach ?>
      <a href="signup_form.php">戻る</a>
  </div>
<?php else : ?>
  <div class="main-c">
    <h2 style="padding:0px 30px">会員登録完了</h2>
    <p>ユーザー登録が完了しました。</p>
    <a href="./signup_form.php">戻る</a>
  </div>
<?php endif; ?>
</body>

</html>