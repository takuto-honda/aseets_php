<?php
  // CSRF対策
  session_start();

  require('validation.php');

  // xss対策
  function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
  // クリックジャッキング対策
  header("X-FRAME-OPTIONS: DENY"); 

  $pageFlag = 0;
  $errors = validation($_POST);

  if(!empty($_POST['btn_confirm']) && empty($errors)){
    $pageFlag = 1;
  }

  if(!empty($_POST['btn_submit'])){
    $pageFlag = 2;
  }
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
    <!-- 入力画面 -->
    <?php if($pageFlag === 0): ?>
    <!-- CSRF対策のためトークンを発行 -->
    <?php
      if(!isset($_SESSION['csrfToken'])){
        //ランダムなバイトを16進数に変換しセッションに代入
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrfToken'] = $csrfToken;
      }
      $token = $_SESSION['csrfToken'];
    ?>

    <!-- バリデーション -->
    <?php
    if(!empty($errors) && !empty($_POST['btn_confirm'])){ 
      echo '<ul>';
        foreach($errors as $error) {
          echo '<li>' . $error . '</li>';
        }
      echo '</ul>';
    }
    ?>

    <form method="POST" action="input.php">
      氏名
      <br>
      <input type="text" name="name" value=<?php if(!empty($_POST['name'])){echo $_POST['name'];} ?>>
      <br>
      メールアドレス
      <br>
      <input type="email" name="email" value=<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>>
      <br>
      性別
      <br>
      <input type="radio" name="gender" value="0">男性
      <input type="radio" name="gender" value="1">女性
      <br>
      年齢
      <br>
      <select name="age">
        <option value="">選択してください</option>
        <option value="1">~19歳</option>
        <option value="2">20歳~29歳</option>
        <option value="3">30歳~39歳</option>
        <option value="4">40歳~49歳</option>
        <option value="5">50歳~59歳</option>
        <option value="6">60歳~</option>
      </select>
      <br>
      お問い合わせ内容
      <br>
      <textarea name="contact"><?php if(!empty($_POST['contact'])){echo $_POST['contact'];} ?></textarea>
      <br>
      <input type="checkbox" name="caution" value="1">注意事項に同意する
      <br>
      <input type="submit" name="btn_confirm" value="確認画面へ">
      <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    </form>
  <?php endif; ?>

  <!-- 確認画面 -->
  <?php if($pageFlag === 1): ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']):?>
    <form method="POST" action="input.php">
      氏名
      <br>
      <?php echo h($_POST['name']); ?>
      <br>
      メールアドレス
      <br>
      <?php echo h($_POST['email']); ?>
      <br>
      性別
      <br>
      <?php echo h($_POST['gender']); ?>
      <br>
      年齢
      <br>
      <?php echo h($_POST['age']); ?>
      <br>
      お問い合わせ内容
      <br>
      <?php echo h($_POST['contact']); ?>
      <br>
      <input type="submit" name="btn_submit" value="送信">
      <input type="submit" name="back" value="戻る">
      <input type="hidden" name="name" value=<?php echo h($_POST['name']);?>>
      <input type="hidden" name="email" value=<?php echo h($_POST['email']);?>>
      <input type="hidden" name="gender" value=<?php echo h($_POST['gender']);?>>
      <input type="hidden" name="age" value=<?php echo h($_POST['age']);?>>
      <input type="hidden" name="contact" value=<?php echo h($_POST['contact']);?>>
      <input type="hidden" name="csrf" value=<?php echo h($_POST['csrf']);?>>
    </form>
  <?php endif;?>  
  <?php endif;?>  
  
  <!-- 送信完了画面 -->
  <?php if($pageFlag === 2): ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']):?>
    送信が完了しました
  <!-- csrfの削除 -->
  <?php unset($_SESSION['csrfToken']); ?>
  <?php endif; ?>
  <?php endif; ?>
</body>
</html>