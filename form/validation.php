<?php

function validation($request) {
  $errors = [];

  if(empty($request['name'])){
    $errors[] = '名前は必須です。';
  }
  if(!empty($request['name']) && 20 < mb_strlen($request['name'])){
    $errors[] = '名前は20文字以内で入力してください。';
  }
  if(empty($request['email'])){
    $errors[] = 'メールアドレスは必須です。';
  }
  if(!empty($request['email']) && !filter_var($request['email'], FILTER_SANITIZE_EMAIL)){
    $errors[] = '不正な形式のメールアドレスです。';
  }
  if(!isset($request['gender'])){
    $errors[]='性別は必須です。';
  }
  if(empty($request['age'])){
    $errors[]='年齢は必須です。';
  }
  if(!empty($request['age']) && 6 < $request['age']){
    $errors[]='正しい年齢を入力してください。';
  }
  if(empty($request['contact']) || 20< mb_strlen($request['contact'])){
    $errors[] = 'お問い合わせ内容は必須です。';
  }
  if(!empty($request['contact']) && 200 < mb_strlen($request['contact'])){
    $errors[] = 'お問い合わせ内容は200文字以内で入力してください。';
  }
  if(empty($request['caution'])){
    $errors[]='「注意事項」をご確認ください。';
  }

  return $errors;
}
?>