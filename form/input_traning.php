<?php
//GETの入力値を取得
// //nameが空でなければ
// if(!empty($_GET['name'])){
//   echo $_GET['name'];
// }

//POSTの入力値を取得
// if(!empty($_POST['name'])){
//   echo $_POST['name'];
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力フォーム</title>
</head>
<body>
  <!-- フォーム作成 -->
  <!-- GETだとURLに表示される -->
  <!-- <form method="GET" action="input.php"> -->
  <!-- <form method="GET" action="input.php"> -->
    <!-- 入力フォーム -->
    <!-- 氏名 -->
    <!-- <input type="text" name="name"> -->
    <!-- <br> -->
    <!-- 送信ボタン -->
    <!-- <input type="submit" value="送信"> -->
  <!-- </form> -->

  <!-- POSTはURLに表示されない -->
  <!-- <form method="POST" action="input.php"> -->
    <!-- 入力フォーム -->
    <!-- 氏名
    <input type="text" name="name">
    <br> -->
    <!-- 送信ボタン -->
    <!-- <input type="submit" value="送信"> -->
  <!-- </form> -->

  <!-- 悪意をもった攻撃者
  xss
  <script>alert('悪意のある攻撃！！');</script> -->

  <!-- クリックジャッkング
  phpファイル
  <?php // header("X-FRAME-OPTIONS: DENY"); ?>
  サーバーの.htaccessに以下のような記述を追加する方法もあります。
  Header set X-FRAME-OPTIONS "DENY"
  または、httpd.confで設定してもOKです。 -->
  

  <!-- isset()は、NULL以外の何かが設定されていればtrue
  empty()は、要素が空であればtrue -->

  <!-- タイプピンティング -->
  <?php
  // //強い方指定
  // // declare(strict_types=1);

  // function typeTest(string $test){
  //   return $test;
  // }
  // $str = 'aaa';
  // echo typeTest('おおお');
  // echo typeTest(1);

  //可変変数
  // function double_variable(...$name){
  //   return var_dump($name);
  // }

  // echo double_variable('本田', '佐藤' , '伊藤');

  // // 関数の中に組み込み関数
  // $name = [' 本田 ', ' 佐藤 ', ' 伊藤 '];
  // echo '<pre>';var_dump($name);echo '</pre>';
  // $trim_array = array_map('trim', $name);
  // echo '<pre>';var_dump($trim_array);echo '</pre>';
  ?>


</body>
</html>