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

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world!</title>
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
    <div class="container">
      <div class="row">
        <div class="col=md-6">
          <form method="POST" action="input.php">
            <div class="form-group">
              <label for="name" class="form-control">氏名</label>
              <input type="text" name="name" value="<?php if(!empty($_POST['name'])){echo $_POST['name'];} ?>" required>
            </div>
            <div class="form-group">
              <label for="email" class="form-control">メールアドレス</label>
              <input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>" required>
            </div>
            性別
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="gender" id="gender1" value="0"
              <?php if(isset($_POST['gender']) && $_POST['gender'] === '0'){echo 'checked';}?>checked>
              <label class="form-check-label" for="gender1">男性</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="gender" id="gender2" value="1"
              <?php if(isset($_POST['gender']) && $_POST['gender'] === '1'){echo 'checked';}?>>
              <label class="form-check-label" for="gender2">女性</label>
            </div>
            <div class="form-group">
              <label for="age">年齢</label>
              <select class="form-control" id="age" name="age">
                <option value="">選択してください</option>
                <option value="1"<?php if(isset($_POST['age']) && $_POST['age'] === '1'){echo 'selected';}?>>~19歳</option>
                <option value="2"<?php if(isset($_POST['age']) && $_POST['age'] === '2'){echo 'selected';}?>>20歳~29歳</option>
                <option value="3"<?php if(isset($_POST['age']) && $_POST['age'] === '3'){echo 'selected';}?>>30歳~39歳</option>
                <option value="4"<?php if(isset($_POST['age']) && $_POST['age'] === '4'){echo 'selected';}?>>40歳~49歳</option>
                <option value="5"<?php if(isset($_POST['age']) && $_POST['age'] === '5'){echo 'selected';}?>>50歳~59歳</option>
                <option value="6"<?php if(isset($_POST['age']) && $_POST['age'] === '6'){echo 'selected';}?>>60歳~</option>
              </select>
            </div>
            <div class="form-group">
              <label for="contact">お問い合わせ内容</label>
              <textarea class="form-control" id="contact" row="3" name="contact" required><?php if(!empty($_POST['contact'])){echo $_POST['contact'];} ?></textarea>
            </div>
            <div class="form-check">
              <input class="form-check-input" id="caution" type="checkbox" name="caution" value="1">
              <label class="form-check-label" for="caution">注意事項に同意する</label>
              <br>
              <input class="btn btn-info" type="submit" name="btn_confirm" value="確認画面へ">
            </div>
            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
          </form>
        </div> <!-- col=md-6 -->
      </div><!-- row -->
    </div><!-- container -->
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
      <?php 
        if($_POST['gender'] === '0'){echo '男性';}
        if($_POST['gender'] === '1'){echo '女性';}
      ?>
      <br>
      年齢
      <br>
      <?php
        if($_POST['age'] === '1'){echo '~19歳';}
        if($_POST['age'] === '2'){echo '20歳~29歳';}
        if($_POST['age'] === '3'){echo '30歳~39歳';}
        if($_POST['age'] === '4'){echo '40歳~49歳';}
        if($_POST['age'] === '5'){echo '50歳~59歳';}
        if($_POST['age'] === '6'){echo '60歳~';}
      ?>
      <br>
      お問い合わせ内容
      <br>
      <?php echo h($_POST['contact']); ?>
      <br>
      <input type="submit" name="btn_submit" value="送信">
      <input type="submit" name="back" value="戻る">
      <input type="hidden" name="name" value="<?php echo h($_POST['name']);?>">
      <input type="hidden" name="email" value="<?php echo h($_POST['email']);?>">
      <input type="hidden" name="gender" value="<?php echo h($_POST['gender']);?>">
      <input type="hidden" name="age" value="<?php echo h($_POST['age']);?>">
      <input type="hidden" name="contact" value="<?php echo h($_POST['contact']);?>">
      <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']);?>">
    </form>
  <?php endif;?>  
  <?php endif;?>  
  
  <!-- 送信完了画面 -->
  <?php if($pageFlag === 2): ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']):?>
  <?php
    require '../pdo/insert.php';
    insertContact($_POST);
  ?>
    送信が完了しました
  <!-- csrfの削除 -->
  <?php unset($_SESSION['csrfToken']); ?>
  <?php endif; ?>
  <?php endif; ?>

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>