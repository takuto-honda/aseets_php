<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  // if(!isset($_SESSION['visited'])){
  //   echo '初回訪問です';
  //   $_SESSION['visited'] = 1;
  //   $_SESSION['date'] = date('c');
  // }else{
  //   $visited = $_SESSION['visited'];
  //   $visited++;
  //   $_SESSION['visited'] = $visited;

  //   echo $_SESSION['visited'].'回目の訪問です<br>';

  //   if(isset($_SESSION['date'])){
  //     echo '前回訪問は'.$_SESSION['date'].'です';
  //     $_SESSION['date'] = date('c');
  //   }
  // }
  // echo '<pre>';var_dump($_SESSION, $_COOKIE);echo '</pre>';exit;

  //クッキーは下記記述で送信できる
  // (クッキー名, 値, クッキーの有効期限, $options = []): bool
  // setcookie("cookiename", 'aaa', time()+60*60*24*30,'/');
  // echo '<pre>';var_dump($_COOKIE['cookiename']);echo '</pre>';exit;

  //セッションの削除方法
  echo 'セッションを破棄しました。';

  $_SESSION = [];

  if(isset($_COOKIE['cookiename'])){
    setcookie('cookiename', '', time()+60*60*24*30,'/');
  }

  session_destroy();

  echo 'セッション';
  echo '<pre>';var_dump($_SESSION, $_COOKIE);echo '</pre>';exit;
?>
</body>
</html>