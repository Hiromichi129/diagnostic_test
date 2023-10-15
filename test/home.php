<?php 
session_start();

require_once 'UserLogic.php';

$result = UserLogic::checkLogin();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホームページ</title>
  <link rel="stylesheet" href="stylesheet.css">
  <script type="text/javascript" src="english.js"></script>
</head>

<body>
  <div class="header">

    <div class="header-logo">
      <a class="homelink" href="/test/home.php">勉強分析診断</a>
    </div>

    <div class="header-list">
      <ul class="lists">
        <li class="login" onclick="toLogin();" style="cursor: pointer;">  <?php
  // ログイン中であれば「マイページ」を表示、それ以外の場合は「ログイン」を表示
  if ($result) {
    echo 'マイページ';
  } else {
    echo 'ログイン';
  }
  ?> <li class="search"><a href="choose.php">診断を選ぶ</a></li>
    </li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="mainC">
      <div class="main-title">勉強分析診断</div>

      <a class="start-btn" href="/test/choose.php">診断を受ける</a>
    </div>
  </div>

</body>

</html>